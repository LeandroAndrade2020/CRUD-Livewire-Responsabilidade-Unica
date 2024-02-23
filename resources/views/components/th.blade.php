@props([
    'width' => null,
])
<th scope="col" width="{{ $width }}" {{ $attributes->merge(['class' => 'px-3 py-2 text-xs font-medium tracking-wider text-left text-white uppercase bg-slate-600']) }}>
    {{ $slot }}
</th>
