<?php

namespace App\Http\Controllers;

use App\Models\FeeItem;
use App\Models\FeeSection;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Fee Structure: the public page and Admin > Fee Structure.
 * Each section is one table on the page (e.g. Bachelor, Diploma); each item is one program row.
 */
class FeeController extends Controller
{
    /** Public page /Fee-Structure. */
    public function page()
    {
        $sections = rescue(fn () => FeeSection::ordered()
            ->where('is_visible', true)
            ->with(['items' => fn ($q) => $q->where('is_visible', true)])
            ->get()
            ->filter(fn ($section) => $section->items->isNotEmpty())
            ->values(), collect());

        return view('client.Fee-structure', [
            'sections' => $sections,
            'note' => Setting::get('fees_note'),
        ]);
    }

    public function index()
    {
        return view('admin.fees', [
            'sections' => FeeSection::ordered()->with('items')->get(),
        ]);
    }

    // ----- Sections -------------------------------------------------------

    public function storeSection(Request $request)
    {
        $data = $this->validateSection($request);
        $data['sort_order'] ??= (int) FeeSection::max('sort_order') + 10;
        FeeSection::create($data);

        return redirect()->route('fee_structure')->with('success', 'Table "' . $data['title'] . '" added.');
    }

    public function editSection(FeeSection $section)
    {
        return view('admin.fee_section_edit', ['section' => $section]);
    }

    public function updateSection(Request $request, FeeSection $section)
    {
        $data = $this->validateSection($request);
        $data['sort_order'] ??= $section->sort_order;
        $section->update($data);

        return redirect()->route('fee_structure')->with('success', 'Table "' . $section->title . '" saved.');
    }

    public function destroySection(FeeSection $section)
    {
        DB::transaction(function () use ($section) {
            FeeItem::where('fee_section_id', $section->id)->delete();
            $section->delete();
        });

        return redirect()->route('fee_structure')->with('success', 'Table "' . $section->title . '" and its programs deleted.');
    }

    // ----- Program rows ---------------------------------------------------

    public function storeItem(Request $request)
    {
        $data = $this->validateItem($request);
        $data['sort_order'] ??= (int) FeeItem::where('fee_section_id', $data['fee_section_id'])->max('sort_order') + 10;
        FeeItem::create($data);

        return redirect()->route('fee_structure')->with('success', '"' . $data['program'] . '" added.');
    }

    public function editItem(FeeItem $item)
    {
        return view('admin.fee_item_edit', [
            'item' => $item,
            'sections' => FeeSection::ordered()->get(),
        ]);
    }

    public function updateItem(Request $request, FeeItem $item)
    {
        $data = $this->validateItem($request);
        $data['sort_order'] ??= $item->sort_order;
        $item->update($data);

        return redirect()->route('fee_structure')->with('success', '"' . $item->program . '" saved.');
    }

    public function toggleItem(FeeItem $item)
    {
        $item->update(['is_visible' => !$item->is_visible]);

        return redirect()->route('fee_structure')->with('success', '"' . $item->program . '" is now ' . ($item->is_visible ? 'shown' : 'hidden') . '.');
    }

    public function destroyItem(FeeItem $item)
    {
        $item->delete();

        return redirect()->route('fee_structure')->with('success', '"' . $item->program . '" deleted.');
    }

    // ----- Validation -----------------------------------------------------

    private function validateSection(Request $request): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'note' => ['nullable', 'string', 'max:500'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:100000'],
        ]);
        $data['is_visible'] = $request->boolean('is_visible');

        return $data;
    }

    private function validateItem(Request $request): array
    {
        // Accept "2,000,000" as well as "2000000".
        $amounts = array_keys(FeeItem::AMOUNTS);
        $request->merge(collect($amounts)->mapWithKeys(fn ($key) => [
            $key => is_string($request->input($key)) ? str_replace([',', ' '], '', $request->input($key)) : $request->input($key),
        ])->all());

        $rules = [
            'fee_section_id' => ['required', 'integer', 'exists:fee_sections,id'],
            'program' => ['required', 'string', 'max:150'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:100000'],
        ];
        foreach ($amounts as $key) {
            $rules[$key] = ['nullable', 'integer', 'min:0', 'max:999999999999'];
        }

        $data = $request->validate($rules, [
            'fee_section_id.required' => 'Choose the table this program belongs to.',
            '*.integer' => 'Use whole numbers only, e.g. 2000000 or 2,000,000.',
        ]);
        $data['is_visible'] = $request->boolean('is_visible');

        return $data;
    }
}
