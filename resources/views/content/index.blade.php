@extends('layouts.Master')
@section('content')
@php
$page = 'content';
@endphp
<h2 class="text-[23px] md:text-[26px] text-gray-600 font-light  ">gestion de contenu</h2>
<p class="text-gray-500 text-[10px] md:text-[13px] mt-1">veuillez seléctionnner un thémes pour votre site</p>
<div class="  font-medium text-center   mt-8  ">
    <ul class="flex items-center space-x-12 text-lg uppercase" id="tabs">
        <!-- ACCUEIL -->
        <li class="">
            <a href="#ACCUEIL"
                class=" p-2 border-b-4 border-primary rounded-t-lg hover:text-gray-600 hover:border-primary "
                data-tab="ACCUEIL">
                Accueil
            </a>
        </li>

        <!-- à propos  -->
        <li class="">
            <a href="#propos"
                class=" p-2 border-b-4 border-transparent rounded-t-lg hover:text-gray-600 hover:border-primary "
                data-tab="propos">
                à propos
            </a>
        </li>
        <!-- contact -->
        <li class="">
            <a href="#contact"
                class=" p-2 border-b-4 border-transparent rounded-t-lg hover:text-gray-600 hover:border-primary "
                data-tab="contact">
                contact
            </a>
        </li>
    </ul>
</div>
<div class="flex justify-between items-center">
    <h2 class="text-lg mt-12 text-gray-600 font-light uppercase ">gestion des slides</h2>
    <label for="propos"
        class="bg-gray-200 cursor-pointer relative w-10 h-4 rounded-full flex items-center transition-all duration-700 ease-in-out">
        <input type="checkbox" id="propos" class="sr-only peer">
        <span
            class="w-5 h-5 bg-primary absolute rounded-full left-5 peer-checked:left-0 transition-all duration-700 ease-in-out"></span>
        <div class="flex justify-between w-full px-1">
            <span class="text-gray-400 text-[12px]">on</span>
            <span class="text-gray-400 text-[12px]">off</span>
        </div>
    </label>
</div>
<div class=" w-[90%] mx-auto mt-4">
    <div class=" h-[35rem] relative  rounded-md">
        <img src="{{ asset('images/slide.png') }}" class="w-full h-full" alt="">
    </div>
    <div class="grid grid-cols-6 space-x-2 m-2 ">
        <div class=" h-32 rounded-md border-2 border-gray-300  border-dashed flex items-center text-lg  justify-center flex-col  ">
            <span class="text-4xl ">+</span>
            <span>Nouveau slide</span>
        </div>
        <div class=" h-32 rounded-md   ">
            <img src="{{ asset('images/slide.png') }}" class="w-full h-full" alt="">
        </div>
        <div class=" h-32 rounded-md   ">
            <img src="{{ asset('images/slide.png') }}" class="w-full h-full" alt="">
        </div>
        <div class=" h-32 rounded-md   ">
            <img src="{{ asset('images/slide.png') }}" class="w-full h-full" alt="">
        </div>
        <div class=" h-32 rounded-md   ">
            <img src="{{ asset('images/slide.png') }}" class="w-full h-full" alt="">
        </div>

    </div>

</div>

{{-- -----------A props------- --}}
<div class="mt-10 w-[90%] mx-auto">
    <div class="flex justify-between py-8">
        <h1 class="text-[20px] font-Poppins font-light text-gray-800 uppercase">APROPOS
        </h1>
        <form action="">
            <div class="flex items-center space-x-4">
                <label for="propos"
                    class="bg-gray-200 cursor-pointer relative w-10 h-4 rounded-full flex items-center transition-all duration-700 ease-in-out">
                    <input type="checkbox" id="propos" class="sr-only peer">
                    <span
                        class="w-5 h-5 bg-primary absolute rounded-full left-5 peer-checked:left-0 transition-all duration-700 ease-in-out"></span>
                    <div class="flex justify-between w-full px-1">
                        <span class="text-gray-400 text-[12px]">on</span>
                        <span class="text-gray-400 text-[12px]">off</span>
                    </div>
                </label>
                <span class="text-[10px] font-normal">A propos est activé</span>
            </div>
        </form>
    </div>
    <div class="flex gap-4">
        <!-- Image et bouton edit -->
        <div class="relative flex items-center justify-center ">
            <img id="image_apropos" src="{{ asset('images/apropos.png') }}" class="w-full">

            <button
                class="absolute inset-0 m-auto p-2 bg-primary rounded-full shadow-md w-12 h-12 flex items-center justify-center">
                <img src="{{ asset('images/edite.png') }}" alt="Modifier">
            </button>
        </div>


        <!-- Formulaire -->
        <form action="" method="POST" class="px-4 grow"
            enctype="multipart/form-data">
            @csrf

            <!--  Titre -->
            <div class="py-2">
                <label for="Titre"
                    class="block text-sm font-semibold text-gray-600">Titre</label>
                <div class="flex gap-4">
                    <input type="text" name="apropos_titre"
                        id="Titre" value=""
                        placeholder="Titre de A propos"
                        class="w-full p-2 border border-gray-300 rounded-md focus:border-primary focus:ring-2 focus:ring-primary shadow-sm">
                    <input type="text" name="apropos_px_titre" placeholder="10px"
                        value=""
                        class="w-[20%] p-2 border border-gray-300 rounded-md focus:border-primary focus:ring-2 focus:ring-primary shadow-sm">
                    @error('apropos_titre')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!--  Sous-titre -->
            <div class="py-2">
                <label for="apropos_sous_titre"
                    class="block text-sm font-semibold text-gray-600">Sous-titre</label>
                <div class="flex gap-4">
                    <input type="text" name="apropos_sous_titre" id="apropos_sous_titre"
                        value=""
                        placeholder="Sous-titre de A propos"
                        class="w-full p-2 border border-gray-300 rounded-md focus:border-primary focus:ring-2 focus:ring-primary shadow-sm">
                    <input type="text" name="px_sous_titre" placeholder="10px"
                        value=""
                        class="w-[20%] p-2 border border-gray-300 rounded-md focus:border-primary focus:ring-2 focus:ring-primary shadow-sm">
                </div>
            </div>

            <!--  Description -->
            <div class="py-2">
                <label for="Description"
                    class="block text-sm font-semibold text-gray-600">Description</label>
                <textarea placeholder="Description" name="description" id="Description" rows="4"
                    value=""
                    class="w-full p-2 border border-gray-300 rounded-md focus:border-primary focus:ring-2 focus:ring-primary shadow-sm resize-y">{{ old('description') }}</textarea>
                @error('description')
                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Action -->
            <div class="py-2">
                <div class="flex items-center space-x-4">
                    <label for="Action"
                        class="bg-gray-200 cursor-pointer relative w-10 h-4 rounded-full flex items-center transition-all duration-700 ease-in-out">
                        <input type="checkbox" id="Action" class="sr-only peer">
                        <span
                            class="w-5 h-5 bg-primary absolute rounded-full left-5 peer-checked:left-0 transition-all duration-700 ease-in-out"></span>
                        <div class="flex justify-between w-full px-1">
                            <span class="text-gray-400 text-xs">On</span>
                            <span class="text-gray-400 text-xs">Off</span>
                        </div>
                    </label>
                    <span class="text-sm font-normal">Action activer</span>
                </div>
            </div>

            <!--  Bouton -->
            <div class="py-2">
                <label for="apropos_bouton_text"
                    class="block text-sm font-semibold text-gray-600">Bouton</label>
                <input type="text" name="apropos_bouton_text" id="apropos_bouton_text"
                    placeholder="Commander" value="{{ old('apropos_bouton_text') }}"
                    class="w-full p-2 border border-gray-300 rounded-md focus:border-primary focus:ring-2 focus:ring-primary shadow-sm">
            </div>

            <!--  Lien de l’action -->
            <div class="py-2">
                <label for="apropos_bouton_action"
                    class="block text-sm font-semibold text-gray-600">Lien de
                    l’action</label>
                <input type="text" name="apropos_bouton_action" id="apropos_bouton_action"
                    value="" placeholder="Lien de l’action"
                    class="w-full p-2 border border-gray-300 rounded-md focus:border-primary focus:ring-2 focus:ring-primary shadow-sm">
            </div>
            <!--  button submit -->

            <div class="py-2">

                <x-primary-button>ajouter</x-primary-button>

            </div>


        </form>
    </div>

</div>
{{-- -----------catégories------- --}}

<div class="mt-10">
    <div class="flex justify-between py-8">
        <h1 class="text-[20px] font-Poppins font-light text-gray-800 uppercase">catégories
        </h1>
        <form action="">
            <div class="flex items-center space-x-4">
                <label for="propos"
                    class="bg-gray-200 cursor-pointer relative w-10 h-4 rounded-full flex items-center transition-all duration-700 ease-in-out">
                    <input type="checkbox" id="propos" class="sr-only peer">
                    <span
                        class="w-5 h-5 bg-primary absolute rounded-full left-5 peer-checked:left-0 transition-all duration-700 ease-in-out"></span>
                    <div class="flex justify-between w-full px-1">
                        <span class="text-gray-400 text-[12px]">on</span>
                        <span class="text-gray-400 text-[12px]">off</span>
                    </div>
                </label>
                <span class="text-[10px] font-normal">A propos est activé</span>
            </div>
        </form>
    </div>

    {{-- categories --}}
    <div class="flex justify-between   gap-4 w-2/4 mx-auto">
        @foreach ($categories as $categorie)
        <div class=" text-center">
            <img src="{{asset('images/catego.png') }}"
                class="rounded-full h-30 w-30">
            <p class="text-[14px] text-gray-500 text-center py-4">{{ $categorie->nom }}</p>
        </div>
        @endforeach
    </div>

    <div class="w-full flex justify-end my-6">
        <x-primary-button> modifier</x-primary-button>
    </div>


</div>


@endsection