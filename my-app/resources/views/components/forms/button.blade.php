@props([
    'type' => 'submit',
])

<button type="{{ $type }}"
    {{ $attributes->merge(['class' => 'w-full bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-sm px-5 py-2.5 rounded-lg shadow-md hover:shadow-indigo-500/20 transition cursor-pointer flex items-center justify-center gap-2']) }}>
    {{ $slot }}
</button>
