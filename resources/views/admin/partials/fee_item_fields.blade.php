@php
    $sections = $sections ?? collect();
    $value = fn ($key) => old($key, $item ? $item->$key : null);
@endphp

<div class="row">
    <div class="col-12 col-md-6 mb-3">
        <label class="form-label">Table</label>
        <select name="fee_section_id" class="form-select" required>
            <option value="">Select table</option>
            @foreach ($sections as $option)
                <option value="{{ $option->id }}" @selected((string) $value('fee_section_id') === (string) $option->id)>{{ $option->title }}</option>
            @endforeach
        </select>
        @error('fee_section_id')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-12 col-md-6 mb-3">
        <label class="form-label">Program name</label>
        <input type="text" name="program" value="{{ $value('program') }}" class="form-control" maxlength="150"
            placeholder="e.g. Computer Engineering" required>
        @error('program')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>

    @foreach (\App\Models\FeeItem::AMOUNTS as $key => $label)
        <div class="col-12 col-md-6 mb-3">
            <label class="form-label">{{ $label }}</label>
            <input type="text" inputmode="numeric" name="{{ $key }}"
                value="{{ $value($key) === null || $value($key) === '' ? '' : (is_numeric($value($key)) ? number_format((float) $value($key)) : $value($key)) }}"
                class="form-control" placeholder="Leave empty to show -">
            @error($key)
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
    @endforeach

    <div class="col-6 col-md-3 mb-3">
        <label class="form-label">Order</label>
        <input type="number" name="sort_order" min="0" value="{{ $value('sort_order') }}" class="form-control"
            placeholder="Last">
        @error('sort_order')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-6 col-md-9 mb-3 d-flex align-items-end">
        <input type="hidden" name="is_visible" value="0">
        <label class="form-check mb-2">
            <input class="form-check-input" type="checkbox" name="is_visible" value="1"
                @checked((string) old('is_visible', $item ? (int) $item->is_visible : 1) === '1')>
            <span class="form-check-label">Show on the website</span>
        </label>
    </div>
</div>
