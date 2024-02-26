@props([
    'width' => null,
])
<th scope="col" width="{{ $width }}" {{ $attributes->merge(['class' => 'px-3 py-2 text-left border cursor-pointer whitespace-nowrap border-spacing-1"']) }}>
    {{ $slot }}
</th>
