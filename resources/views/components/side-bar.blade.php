@props(['page'])
<!-- Sidebar -->
<div class="w-full  h-full bg-white ">
    <div class=" flex items-center justify-center mb-10">
        <img class="w-24 md:w-28 " src="{{ asset('images/logo.png') }}">

    </div>
    <ul class="flex flex-col space-y-3 ">
        <a href="{{ route('dashboard') }}">
            <li
                class="flex items-center justify-center md:justify-start px-4 pe-0 py-2 text-gray-700 hover:bg-gray-100  cursor-pointer">
                <img class="md:mr-4 w-5 md:w-[20px]  " src="{{ asset('images/dash.png') }}">
                <span class="text-[13px] grow hidden lg:block"> Tablaue de board</span>
            </li>
        </a>
        <a href="">
            <li
                class="flex items-center justify-center md:justify-start px-4 pe-0 py-2 text-gray-700 hover:bg-gray-100  cursor-pointer active">
                <img class="md:mr-4 w-5 md:w-[20px] " src="{{ asset('images/comm.png') }}">
                <span class="text-[13px] grow hidden lg:block">Commandes</span>
            </li>
        </a>

        <a href="{{ route('produits.index') }}">
            <li
                class=" relative flex items-center justify-center md:justify-start px-4 pe-0 py-3   cursor-pointer  text-sky-950  @if ($page == 'produits') bg-primary text-white before:absolute before:bg-primary before:w-10 before:h-full before:-right-8 before:rounded-r-full @endif ">
                <img class="md:mr-4 w-5 md:w-[20px]  " src="{{ asset('images/catigo.png') }}">
                <span class="text-[13px] grow hidden lg:block"> Gestion des produits</span>
            </li>
        </a>


        <a href="{{ route('ingredients.index') }}">
            <li class="relative flex items-center justify-center md:justify-start px-4 pe-0 py-2   hover:bg-gray-100  cursor-pointer  text-sky-950  @if ($page == 'ingredients') hover:bg-primary bg-primary text-white before:absolute before:bg-primary before:w-10 before:h-full before:-right-8 before:rounded-r-full @endif ">
                <img class="md:mr-4 w-5 md:w-[20px] " src="{{ asset('images/dash.png') }}">
                <span class="text-[13px] grow hidden lg:block">Gestion des ingrédients</span>
            </li>
        </a>
        <a href="{{ route('categories.index') }}">
            <li
                class="relative   flex items-center justify-center md:justify-start px-4 pe-0 py-2  hover:bg-gray-100  cursor-pointer  text-sky-950  @if ($page == 'categorie') hover:bg-primary bg-primary text-white before:absolute    before:bg-primary before:w-10 before:h-full before:-right-8 before:rounded-r-full @endif ">
                <img class="md:mr-4 w-5 md:w-[20px] " src="{{ asset('images/catigo.png') }}">
                <span class="text-[13px] hidden lg:block">Gestion des catégories</span>
            </li>
        </a>
        <a href="{{ route('promo.index') }}">
            <li
                class="relative flex items-center justify-center md:justify-start px-4 pe-0 py-2 text-gray-700 hover:bg-gray-100  cursor-pointer  @if ($page == 'promos') bg-primary text-white before:absolute before:bg-primary before:w-10 before:h-full before:-right-8 before:rounded-r-full @endif ">
                <img class="md:mr-4 w-5 md:w-[20px] " src="{{ asset('images/promo.png') }}">
                <span class="text-[13px] hidden lg:block"> Code Promo</span>
            </li>
        </a>
        <a href="{{ route('content.index') }}">
            <li
                class="relative flex items-center justify-center md:justify-start px-4 pe-0 py-2 text-gray-700 hover:bg-gray-100  cursor-pointer  @if ($page == 'content') bg-primary hover:bg-primary text-white before:absolute before:bg-primary before:w-10 before:h-full before:-right-8 before:rounded-r-full @endif">
                <img class="md:mr-4 w-5 md:w-[20px] " src="{{ asset('images/settings.png') }}">
                <span class="text-[13px] hidden lg:block">Gestion contenu</span>
            </li>
        </a>
    </ul>
</div>
