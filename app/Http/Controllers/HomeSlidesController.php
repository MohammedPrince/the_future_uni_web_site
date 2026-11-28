<?php

namespace App\Http\Controllers;

use App\Models\HomeSlide;
use App\Support\ImageUploads;
use Illuminate\Http\Request;

/** Admin > Home Slider: the big slider at the top of the home page. */
class HomeSlidesController extends Controller
{
    public function index()
    {
        return view('admin.home_slides', ['slides' => HomeSlide::ordered()->get()]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request, true);
        $data += ImageUploads::slide($request->file('image'));
        $data['sort_order'] ??= (int) HomeSlide::max('sort_order') + 10;
        HomeSlide::create($data);

        return redirect()->route('slides.index')->with('success', 'Slide added. It is on the home page now.');
    }

    public function edit(HomeSlide $slide)
    {
        return view('admin.home_slide_edit', ['slide' => $slide]);
    }

    public function update(Request $request, HomeSlide $slide)
    {
        $data = $this->validated($request, false);
        $data['sort_order'] ??= $slide->sort_order;

        if ($request->hasFile('image')) {
            $old = [$slide->image, $slide->widths, $slide->ext];
            $data += ImageUploads::slide($request->file('image'));
            $slide->update($data);
            ImageUploads::deleteSlide(...$old);
        } else {
            $slide->update($data);
        }

        return redirect()->route('slides.index')->with('success', 'Slide saved.');
    }

    public function toggle(HomeSlide $slide)
    {
        if ($slide->is_visible && HomeSlide::where('is_visible', true)->count() === 1) {
            return redirect()->route('slides.index')->with('failure', 'Keep at least one slide visible: the top of the home page cannot be empty.');
        }
        $slide->update(['is_visible' => !$slide->is_visible]);

        return redirect()->route('slides.index')->with('success', 'Slide ' . ($slide->is_visible ? 'shown' : 'hidden') . '.');
    }

    public function destroy(HomeSlide $slide)
    {
        if (HomeSlide::count() === 1) {
            return redirect()->route('slides.index')->with('failure', 'This is the last slide. Add another one before deleting it.');
        }
        $slide->delete();
        ImageUploads::deleteSlide($slide->image, $slide->widths, $slide->ext);

        return redirect()->route('slides.index')->with('success', 'Slide deleted.');
    }

    private function validated(Request $request, bool $creating): array
    {
        $data = $request->validate([
            'subtitle' => ['nullable', 'string', 'max:150'],
            'title' => ['required', 'string', 'max:250'],
            'alt' => ['nullable', 'string', 'max:200'],
            'button_text' => ['nullable', 'required_with:button_url', 'string', 'max:60'],
            'button_url' => ['nullable', 'required_with:button_text', 'max:500', 'regex:#^(https?://|/)[^\s<>"]*$#i'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:100000'],
            'image' => [$creating ? 'required' : 'nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:15360', 'dimensions:min_width=1000,min_height=500'],
        ], [
            'image.dimensions' => 'Use a large, wide photo: at least 1000 × 500 pixels (2200 × 1467 is best).',
            'image.max' => 'The photo must be smaller than 15 MB.',
            'button_url.regex' => 'The link must start with https:// or / (a page of this website).',
        ]);
        unset($data['image']);
        $data['is_visible'] = $request->boolean('is_visible');

        return $data;
    }
}
