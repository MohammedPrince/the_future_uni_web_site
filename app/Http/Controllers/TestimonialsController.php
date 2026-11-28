<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Support\ImageUploads;
use Illuminate\Http\Request;

/** Admin > Testimonials: the Alumni Testimonials section of the home page. */
class TestimonialsController extends Controller
{
    public function index()
    {
        return view('admin.testimonials', ['testimonials' => Testimonial::ordered()->get()]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        if ($request->hasFile('photo')) {
            $data['photo'] = ImageUploads::portrait($request->file('photo'));
        }
        $data['sort_order'] ??= (int) Testimonial::max('sort_order') + 10;
        Testimonial::create($data);

        return redirect()->route('testimonials.index')->with('success', 'Testimonial added.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial_edit', ['testimonial' => $testimonial]);
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $this->validated($request);
        $data['sort_order'] ??= $testimonial->sort_order;
        $old = $testimonial->photo;

        if ($request->hasFile('photo')) {
            $data['photo'] = ImageUploads::portrait($request->file('photo'));
        } elseif ($request->boolean('remove_photo')) {
            $data['photo'] = null;
        }
        $testimonial->update($data);

        if (array_key_exists('photo', $data) && $old !== $data['photo']) {
            ImageUploads::deletePortrait($old);
        }

        return redirect()->route('testimonials.index')->with('success', 'Testimonial saved.');
    }

    public function toggle(Testimonial $testimonial)
    {
        $testimonial->update(['is_visible' => !$testimonial->is_visible]);

        return redirect()->route('testimonials.index')->with('success', 'Testimonial ' . ($testimonial->is_visible ? 'shown' : 'hidden') . '.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        ImageUploads::deletePortrait($testimonial->photo);

        return redirect()->route('testimonials.index')->with('success', 'Testimonial deleted.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'position' => ['nullable', 'string', 'max:250'],
            'quote' => ['required', 'string', 'max:1000'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:100000'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ], [
            'photo.max' => 'The photo must be smaller than 5 MB.',
        ]);
        unset($data['photo']);
        // The page adds the quotation marks.
        $data['quote'] = trim($data['quote'], " \t\n\r\"“”");
        $data['is_visible'] = $request->boolean('is_visible');

        return $data;
    }
}
