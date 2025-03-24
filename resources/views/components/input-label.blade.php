@props(['value'])

<label {{ $attributes->merge(['class' => 'block mb-2 font-medium text-sm']) }}>
    {{ $value ?? $slot }}
</label>
