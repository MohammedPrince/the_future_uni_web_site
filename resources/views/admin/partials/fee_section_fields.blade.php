@php($value = fn ($key) => old($key, $section ? $section->$key : null))

<div class="mb-3">
    <label class="form-label">Table title</label>
    <input type="text" name="title" value="{{ $value('title') }}" class="form-control" maxlength="150"
        placeholder="e.g. Diploma Programs" required>
    @error('title')
        <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Note under the title (optional)</label>
    <input type="text" name="note" value="{{ $value('note') }}" class="form-control" maxlength="500"
        placeholder="e.g. Fees per academic year">
    @error('note')
        <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>

<div class="row">
    <div class="col-6 mb-3">
        <label class="form-label">Order</label>
        <input type="number" name="sort_order" min="0" value="{{ $value('sort_order') }}" class="form-control"
            placeholder="Last">
        @error('sort_order')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-6 mb-3 d-flex align-items-end">
        <input type="hidden" name="is_visible" value="0">
        <label class="form-check mb-2">
            <input class="form-check-input" type="checkbox" name="is_visible" value="1"
                @checked((string) old('is_visible', $section ? (int) $section->is_visible : 1) === '1')>
            <span class="form-check-label">Show on the website</span>
        </label>
    </div>
</div>
