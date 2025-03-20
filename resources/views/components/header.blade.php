<header class=" bg-white h-16 flex items-center justify-between px-4">
    <div class="">
        <img class="mr-4 w-[33px] cursor-pointer " src="{{ asset('images/menu.png') }}">
    </div>
    <div class="flex items-center gap-4">
        <img class=" w-[23px] cursor-pointer  " src="{{ asset('images/notification.png') }}">
        <img class=" w-[23px]  cursor-pointer " src="{{ asset('images/settings.png') }}">
        <img class=" w-[35px] cursor-pointer  " src="{{ asset('images/logo.png') }}">
        {{-- <div>
        @if (Route::has('login'))
            <nav class="flex items-center justify-end gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="inline-block px-5 py-1.5    rounded-sm text-sm leading-normal">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="inline-block px-5 py-1.5  rounded-sm text-sm leading-normal">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="inline-block px-5 py-1.5  rounded-sm text-sm leading-normal">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </div> --}}
</header>
