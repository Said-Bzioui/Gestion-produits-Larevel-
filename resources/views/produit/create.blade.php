@extends('layouts.Master')

@section('content')
    @php
        $page = 'produits';
    @endphp

    <h2 class="text-[23px] md:text-[26px] text-gray-600 font-light">Ajouter des Produits</h2>
    <a href="{{ url()->previous() }}" class="text-[12px] text-gray-500 cursor-pointer">
        < Retour</a>
            <div class="p-4 mt-4">

                <div>
                    <form action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- image feild --}}
                        <div class="w-3/5 px-6  flex items-center justify-between space-x-12 mb-12">
                            <label for="dropzone-file"
                                class="flex flex-col items-center justify-center h-56 grow  border-2 border-gray-300 border-dashed rounded-lg cursor-pointer">
                                <div class="flex flex-col items-center justify-center">
                                    <i class="fas fa-plus text-4xl text-gray-500 "></i>
                                    <p class="mb-2 text-sm text-gray-500">Nouveau Image</p>

                                </div>
                                <input id="dropzone-file" type="file" accept="image/*" name="image"
                                    class="image_produit hidden" />
                            </label>
                            <div class="w-80 h-56 rounded-md overflow-hidden ">
                                <img id="image_produitAffichier" src="#" alt="Image preview"
                                    class="w-full h-56 object-cover hidden">
                            </div>
                        </div>
                        {{-- inputs  --}}
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-2 ">
                            <div class="w-full px-6 space-y-5">
                                <div>
                                    <div class="flex justify-between mb-2">
                                        {{-- <label for="nom" class="text-[14] font-[600] my-2">Nom</label> --}}
                                        <x-input-label value='Nom' />
                                        <div>

                                            <input type="radio" id="fr" name="langue" value="fr"
                                                class="hidden langue" checked>
                                            <label for="fr" class="text-[14px] font-[700] cursor-pointer">Fr</label>
                                            <span> | </span>
                                            <input type="radio" id="en" name="langue" value="en"
                                                class="hidden langue">
                                            <label for="en" class="text-[14px] font-[700] cursor-pointer">En</label>
                                            <span> | </span>
                                            <input type="radio" id="nl" name="langue" value="nl"
                                                class="hidden langue">
                                            <label for="nl" class="text-[14px] font-[700] cursor-pointer">NI</label>
                                        </div>

                                    </div>
                                    <x-text-input placeholder="Nom" />
                                </div>
                                <div class="space-y-5 grid grid-cols-1 md:grid-cols-2 gap-2">
                                    <div class="w-full">
                                        <x-input-label value='Prix Emporter' />
                                        <x-text-input placeholder="emporter" />

                                    </div>
                                    <div class="w-full">
                                        <x-input-label value='Prix Livraison' />
                                        <x-text-input placeholder="Livraison" />
                                    </div>
                                </div>
                            </div>

                            <div class="px-6 w-full my-5">
                                <x-input-label value='Description' />
                                <x-texterea />
                            </div>
                        </div>
                        <div class="w-full px-6 my-6">
                            <x-input-label value='Meta Title' />
                            <x-text-input placeholder="meta title" />
                        </div>
                        {{-- Ingrédients --}}
                        <div class="w-full px-6 my-6">
                            <div x-data="{
                                selectedIngredient: [],
                                availableIngredient: [
                                    @foreach ($ingredients as $ingredient)
                { id: {{ $ingredient->id }},
                  name: '{{ $ingredient->fr_nom }}' }, @endforeach
                            
                                ]
                            }" class="w-full">
                                <label for="ingredients" class="block text-[14px] font-[600] my-2">Ingrédients</label>
                                <div
                                    class="border rounded-lg p-2 w-full flex flex-wrap gap-2 bg-white shadow-[inset_0_2px_4px_0_rgba(0,0,0,0.1)]">
                                    <!-- Display selected ingredients -->
                                    <template x-for="(ingredient, index) in selectedIngredient" :key="index">
                                        <span
                                            class="bg-gray-200 text-gray-700 px-3 py-1 rounded-md flex items-center space-x-1">
                                            <span x-text="ingredient.name"></span>
                                            <button type="button" class="ml-2 text-gray-500 hover:text-gray-700"
                                                @click="selectedIngredient.splice(index, 1); availableIngredient.push(ingredient);">
                                                &times;
                                            </button>
                                        </span>
                                    </template>

                                    <!-- Hidden input to store selected ingredients for form submission -->
                                    <select name="ing_id[]" multiple class="hidden">
                                        <template x-for="ingredient in selectedIngredient" :key="ingredient.id">
                                            <option x-bind:value="ingredient.id" selected></option>
                                        </template>
                                    </select>

                                    <!-- Dropdown to add ingredients -->
                                    <select name="ing_id"
                                        x-on:change="if ($event.target.value) { 
                    let selected = availableIngredient.find(i => i.id == $event.target.value);
                    if (selected && !selectedIngredient.some(i => i.id == selected.id)) {
                        selectedIngredient.push(selected);
                        availableIngredient = availableIngredient.filter(i => i.id !== selected.id); 
                    }
                    $event.target.value = ''; 
                }"
                                        class="border-none outline-none text-gray-700  focus:ring-2 focus:ring-primary">
                                        <option value="" disabled selected>Ajouter des ingrédients</option>
                                        <template x-for="ingredient in availableIngredient" :key="ingredient.id">
                                            <option x-bind:value="ingredient.id" x-text="ingredient.name"></option>
                                        </template>
                                    </select>

                                </div>
                            </div>
                        </div>



                        {{-- categories --}}
                        <div class="w-full px-6">
                            <div x-data="{
                                selectedCategories: [],
                                availableCategories: [
                                    @foreach ($categories as $categorie) 
                { id: {{ $categorie->id }},
                  name: '{{ $categorie->nom }}' }, @endforeach
                                ]
                            }" class="w-full">

                                <label for="categories" class="block text-[14px] font-[600] my-2">categorie</label>

                                <div
                                    class="border rounded-lg p-2 w-full flex flex-wrap gap-2 bg-white shadow-[inset_0_2px_4px_0_rgba(0,0,0,0.1)]">
                                    <template x-for="(category, index) in selectedCategories" :key="category.id">
                                        <span
                                            class="bg-gray-200 text-gray-700 px-3 py-1 rounded-md flex items-center space-x-1">
                                            <span x-text="category.name"></span>
                                            <button type="button" class="ml-2 text-gray-500 hover:text-gray-700"
                                                @click="selectedCategories.splice(index, 1)">
                                                &times;
                                            </button>
                                        </span>
                                    </template>

                                    <select name="categories[]" multiple class="hidden">
                                        <template x-for="category in selectedCategories" :key="category.id">
                                            <option :value="category.id" selected></option>
                                        </template>
                                    </select>

                                    <select name="categorie_id"
                                        x-on:change="if ($event.target.value) {
                    let selected = availableCategories.find(c => c.id == $event.target.value);
                    if (selected && !selectedCategories.some(c => c.id == selected.id)) {
                        selectedCategories.push(selected);
                    }
                    $event.target.value = ''; 
                }"
                                        class="border-none outline-none text-gray-700 focus:border-primary focus:ring-2 focus:ring-primary">
                                        <option value="" disabled selected>Ajouter une catégorie</option>
                                        <template x-for="categorie in availableCategories" :key="categorie.id">
                                            <option :value="categorie.id" x-bind:data-id="categorie.id"
                                                x-text="categorie.name"></option>
                                        </template>
                                    </select>


                                </div>
                            </div>
                        </div>



                        {{-- -------------bioson-------- ------------Accompagnement---------- --}}
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                            <!-- Boisson Section -->
                            <div class="mt-4">
                                <label for="Boisson" class="text-[14px] font-[600] px-6">Boisson:</label>
                                <div class="my-2 space-y-2">
                                    <div class="flex gap-4 items-center">
                                        <input type="checkbox" name="boisson" id="CocaCola" value="CocaCola"
                                            class="hidden-checkbox">
                                        <label for="CocaCola">Coca-cola 33cl</label>
                                        <span
                                            class="px-2 py-2 shadow-[inset_0_4px_6px_0_rgba(0,0,0,0.1)] rounded-md text-[14px]">+
                                            0,50€</span>
                                    </div>

                                    <div class="flex gap-4 items-center">
                                        <input type="checkbox" name="boisson" id="Fanta" value="Fanta"
                                            class="hidden-checkbox">
                                        <label for="Fanta">Fanta 33cl</label>
                                        <span
                                            class="px-2 py-2 shadow-[inset_0_4px_6px_0_rgba(0,0,0,0.1)] rounded-md text-[14px]">+
                                            0,50€</span>
                                    </div>

                                    <div class="flex gap-4 items-center">
                                        <input type="checkbox" name="boisson" id="IceTea" value="IceTea"
                                            class="hidden-checkbox">
                                        <label for="IceTea">Ice Tea Lipton 33cl</label>
                                        <span
                                            class="px-2 py-2 shadow-[inset_0_4px_6px_0_rgba(0,0,0,0.1)] rounded-md text-[14px]">+
                                            0,50€</span>
                                    </div>

                                    <div class="flex gap-4 items-center">
                                        <input type="checkbox" name="boisson" id="EauPlate" value="EauPlate"
                                            class="hidden-checkbox">
                                        <label for="EauPlate">Eau plate 50cl</label>
                                        <span
                                            class="px-2 py-2 shadow-[inset_0_4px_6px_0_rgba(0,0,0,0.1)] rounded-md text-[14px]">+
                                            0,50€</span>
                                    </div>
                                    @error('boisson')
                                        <div class="text-red-500 text-[12px] mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Accompagnement Section -->
                            <div class="mt-4">
                                <label for="Accompagnement" class="text-[14px] font-[600] px-6">Accompagnement:</label>
                                <div class="my-2 space-y-2">
                                    <div class="flex gap-4 items-center">
                                        <input type="checkbox" name="accompagnement" value="Frites" id="Frites"
                                            class="hidden-checkbox">
                                        <label for="Frites">Frites Belge</label>
                                        <span
                                            class="px-2 py-2 shadow-[inset_0_4px_6px_0_rgba(0,0,0,0.1)] rounded-md text-[14px]">+
                                            0,50€</span>
                                    </div>

                                    <div class="flex gap-4 items-center">
                                        <input type="checkbox" name="accompagnement" value="Potatoes" id="Potatoes"
                                            class="hidden-checkbox">
                                        <label for="Potatoes">Potatoes</label>
                                        <span
                                            class="px-2 py-2 shadow-[inset_0_4px_6px_0_rgba(0,0,0,0.1)] rounded-md text-[14px]">+
                                            1,50€</span>
                                    </div>

                                    <div class="flex gap-4 items-center">
                                        <input type="checkbox" name="accompagnement" value="Rustic" id="Rustic"
                                            class="hidden-checkbox">
                                        <label for="Rustic">Rustic twist</label>
                                        <span
                                            class="px-2 py-2 shadow-[inset_0_4px_6px_0_rgba(0,0,0,0.1)] rounded-md text-[14px]">+
                                            2,50€</span>
                                    </div>
                                    @error('accompagnement')
                                        <div class="text-red-500 text-[12px] mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Sauce Section -->
                            <div class="mt-4">
                                <label for="sauce" class="text-[14px] font-[600] px-6">Choix sauce:</label>
                                <div class="flex gap-4">
                                    <div class="my-2 space-y-2">

                                        <div class="items-center">
                                            <input type="checkbox" name="sauce" value="Andalouse" id="Andalouse"
                                                class="hidden-checkbox">
                                            <label for="Andalouse">Andalouse</label>
                                        </div>

                                        <div class="items-center">
                                            <input type="checkbox" name="sauce" value="Samorai" id="Samorai"
                                                class="hidden-checkbox">
                                            <label for="Samorai">Samorai</label>
                                        </div>

                                        <div class="items-center">
                                            <input type="checkbox" name="sauce" value="Ketchup" id="Ketchup"
                                                class="hidden-checkbox">
                                            <label for="Ketchup">Ketchup</label>
                                        </div>

                                        <div class="items-center">
                                            <input type="checkbox" name="sauce" value="Mayonnaise" id="Mayonnaise"
                                                class="hidden-checkbox">
                                            <label for="Mayonnaise">Mayonnaise</label>
                                        </div>
                                    </div>
                                    <div class="space-y-2">
                                        <span
                                            class="px-2 py-1 shadow-[inset_0_4px_6px_0_rgba(0,0,0,0.1)] rounded-md text-[14px] block">+
                                            0,50€</span>
                                        <span
                                            class="px-2 py-1 shadow-[inset_0_4px_6px_0_rgba(0,0,0,0.1)] rounded-md text-[14px] block">+
                                            0,50€</span>
                                        <span
                                            class="px-2 py-1 shadow-[inset_0_4px_6px_0_rgba(0,0,0,0.1)] rounded-md text-[14px] block">+
                                            0,50€</span>
                                        <span
                                            class="px-2 py-1 shadow-[inset_0_4px_6px_0_rgba(0,0,0,0.1)] rounded-md text-[14px] block">+
                                            0,50€</span>
                                    </div>
                                </div>
                                @error('sauce')
                                    <div class="text-red-500 text-[12px] mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- -------------radio---------- --}}

                        <div class="w-full grid grid-cols-1 lg:grid-cols-3 gap-2 px-6 ">

                            <div class="mt-4 flex justify-between items-center">
                                <div class="flex items-center space-x-4">
                                    <label for="toggle3"
                                        class="bg-gray-200 cursor-pointer relative w-12 h-6 rounded-full flex items-center transition-all duration-700 ease-in-out">
                                        <input type="checkbox" id="toggle3" class="sr-only peer">
                                        <span
                                            class="w-6 h-6 bg-primary absolute rounded-full left-0 peer-checked:left-7 transition-all duration-700 ease-in-out"></span>
                                        <div class="flex justify-between w-full px-1">
                                            <span class="text-gray-400 text-[13px]">off</span>
                                            <span class="text-gray-400 text-[13px]">on</span>
                                        </div>
                                    </label>
                                    <span class="text-[14px] font-normal">Afficher dans le menu</span>
                                </div>
                            </div>

                            <div class="mt-4 flex justify-between items-center">
                                <div class="flex items-center space-x-4">
                                    <label for="toggle2"
                                        class="bg-gray-200 cursor-pointer relative w-12 h-6 rounded-full flex items-center transition-all duration-700 ease-in-out">
                                        <input type="checkbox" id="toggle2" class="sr-only peer">
                                        <span
                                            class="w-6 h-6 bg-primary absolute rounded-full left-0 peer-checked:left-7 transition-all duration-700 ease-in-out"></span>
                                        <div class="flex justify-between w-full px-1">
                                            <span class="text-gray-400 text-[13px]">off</span>
                                            <span class="text-gray-400 text-[13px]">on</span>
                                        </div>
                                    </label>
                                    <span class="text-[14px] font-normal">Produit activer dans le premier
                                        slide</span>
                                </div>
                            </div>

                            <div class="mt-4 flex justify-between items-center">
                                <div class="flex items-center space-x-4">
                                    <label for="toggle1"
                                        class="bg-gray-200 cursor-pointer relative w-12 h-6 rounded-full flex items-center transition-all duration-700 ease-in-out">
                                        <input type="checkbox" id="toggle1" class="sr-only peer">
                                        <span
                                            class="w-6 h-6 bg-primary absolute rounded-full left-0 peer-checked:left-7 transition-all duration-700 ease-in-out"></span>
                                        <div class="flex justify-between w-full px-1">
                                            <span class="text-gray-400 text-[13px]">off</span>
                                            <span class="text-gray-400 text-[13px]">on</span>
                                        </div>
                                    </label>
                                    <span class="text-[14px] font-normal">Produit activer dans le premier
                                        slide</span>
                                </div>
                            </div>
                        </div>


                        {{-- -------------button submit---------- --}}
                        <div class="px-6 my-10">
                            <button type="submit" class="px-[10%]  py-3 font-[300] bg-primary text-white rounded-md">
                                ajouter
                            </button>
                        </div>





                    </form>
                </div>
            </div>

            <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
            <script>
                const image_produit = document.getElementById('dropzone-file');
                if (image_produit) {
                    image_produit.addEventListener('change', AfficheImageProduit);
                }

                function AfficheImageProduit(event) {
                    var reader = new FileReader();
                    reader.onload = function() {
                        var image_produitAffichier = document.getElementById('image_produitAffichier');
                        if (image_produitAffichier) {
                            image_produitAffichier.src = reader.result;
                            image_produitAffichier.classList.remove('hidden');
                        }
                    };
                    if (event.target.files && event.target.files[0]) {
                        reader.readAsDataURL(event.target.files[0]);
                    }
                }
            </script>
        @endsection








        {{-- cdn : --}}
