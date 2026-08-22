@props(['label', 'name', 'type' => 'text'])

<div>
    <label for="{{ $name }}" class="label">{{ $label }}</label>
    <input type="{{ $type }}" class="input" id="{{ $name }}" name="{{ $name }}"
        value="{{ $type === 'password' ? '' : old($name) }}" {{ $attributes }} required />

    @error($name)
        <p class="error">{{ $message }}</p>
    @enderror
</div>
