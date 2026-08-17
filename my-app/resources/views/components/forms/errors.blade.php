@props([
    'name' => 'required',
])

@error($name)
    <p class="text-xs text-rose-500 font-medium mt-2">{{ $message }}</p>
@enderror
