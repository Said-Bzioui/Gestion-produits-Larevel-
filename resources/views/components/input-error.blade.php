@props(['messages'])

@if (!empty($messages))
    <div {{ $attributes->merge(['class' => 'w-full flex items-center justify-center  text-md text-white bg-primary px-2 py-1 rounded-full']) }}>
        <span class="flex items-center"> 
            <i class="fa-solid fa-triangle-exclamation text-3xl mr-5 font-normal"></i>
            {{ is_array($messages) ? $messages[0] : $messages }}
        </span>
    </div>
@endif
