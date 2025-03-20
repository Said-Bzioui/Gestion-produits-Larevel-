<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' => ' w-56 h-12  p-2 bg-primary border border-transparent rounded-full font-semibold text-sm text-white  uppercase tracking-widest  cursor-pointer
    ',
    ]) }}>
    {{ $slot }}
</button>
