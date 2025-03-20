@props(['messages'])

    <div {{ $attributes->merge(['class' => 'w-full  ' . (empty($messages) ? 'opacity-0' : '') . ' text-md text-white bg-primary px-2 py-1 rounded-full']) }}>
        @foreach ((array) $messages as $message)
            <span class="flex items-center "> <i class="fa-solid fa-xmark text-3xl mr-2 font-normal"></i>{{ $message }}</span>
        @endforeach
    </div>

