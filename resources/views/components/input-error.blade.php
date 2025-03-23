@props(['messages'])

@if (!empty($messages))
    <div {{ $attributes->merge(['class' => 'w-full text-md text-white bg-primary px-2 py-1 rounded-full']) }}>
        <span class="flex items-center"> 
            <i class="fa-solid fa-xmark text-3xl mr-2 font-normal"></i> 
            {{ is_array($messages) ? $messages[0] : $messages }}
        </span>
    </div>
@endif
