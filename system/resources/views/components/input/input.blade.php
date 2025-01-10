<div class="form-group">
    <label for="{{ $name }}">{{ $title ?? '' }}</label>
    <input type="{{ $type ?? 'text' }}" name="{{ $name }}" id="{{ $name }}" class="form-control @error($name) is-invalid @enderror" placeholder="{{ $placeholder ?? '...' }}" value="@isset($value){{ $value }}@else{{ old($name) }}@endisset" @isset($readonly) readonly @endisset>

    @error($name)
        <span class="text-error">{{ $message }}</span>
    @enderror
</div>
