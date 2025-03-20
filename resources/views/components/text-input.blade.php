@props(['disabled' => false, 'rounded' => 'rounded-lg'])
@php
$classes = "h-11 w-full text-sm px-4  border-gray-300  $rounded  shadow-[inset_0_2px_4px_0_rgba(0,0,0,0.1)]";
@endphp
<input @disabled($disabled) {{ $attributes->merge(['class' => $classes]) }}>
