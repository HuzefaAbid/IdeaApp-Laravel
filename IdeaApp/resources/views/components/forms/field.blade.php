@props(['label', 'name', 'type' => 'text', 'required' => true])

<div>
    <label for="{{ $name }}" class="label">{{ $label }}</label>
    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}"
        value="{{ $type === 'password' ? '' : old($name) }}" @required($required)
        @error($name) aria-invalid="true" aria-describedby="{{ $name }}-error" @enderror
        {{ $attributes->merge(['class' => 'input']) }} />

    @error($name)
        <p class="error" id="{{ $name }}-error">{{ $message }}</p>
    @enderror
</div>

@error($name)
    <p class="error">{{ $message }}</p>
@enderror
</div>
