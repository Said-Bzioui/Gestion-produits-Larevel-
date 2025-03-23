@extends('layouts.master')
@section('content')
    @php
        $page = 'ingredients';
    @endphp
    <h2 class="text-[23px] md:text-[26px] text-gray-600 font-light  ">gestion des ingrédients</h2>
    <p class="text-gray-500 text-[10px] md:text-[13px] mt-1">veuillez seléctionnner un thémes pour votre site</p>

    <div class="flex flex-col lg:flex-row mt-12">
        <div class="w-full lg:w-2/8 bg-gray-50  p-4  rounded-md">
            <h2 class="mb-10 w-fit mx-auto text-xl">nouveau ingrédient</h2>
            <form action="{{ route('ingredients.store') }}" method="post" class=" space-y-3 ">
                @csrf
                <div>
                    <x-input-label value="Nom(fr)" />
                    <x-text-input class="bg-white " name="fr_nom" />
                </div>
                <div>
                    <x-input-label value="Nom(en)" />
                    <x-text-input class="bg-white " name="en_nom" />
                </div>
                <div>
                    <x-input-label value="Nom(ni)" />
                    <x-text-input class="bg-white " name="nl_nom" />
                </div>
                <div class="flex justify-center">
                    <x-primary-button class="mt-8 mx-auto rounded-lg">ajouter</x-primary-button>
                </div>
            </form>
        </div>
        <div class=" grow">
            <div class="flex flex-col md:flex-row justify-between md:px-5 py-3 md:items-center">
                <h2 class=" w-fit text-[23px] md:text-[26px] text-gray-600 font-light mb-2 md:mt-0">liste des ingrédients
                </h2>
                <div class="relative   rounded-md   overflow-hidden shadow-[inset_0_2px_4px_0_rgba(0,0,0,0.1)]  ">
                    <input type="search" id="location-search"
                        class="block p-2.5 pe-10 w-full z-20 text-sm text-gray-400  outline-none inset-shadow-lg   "
                        placeholder="Search ..." required />
                    <button type="submit" class="absolute top-0 end-0 h-full p-2.5 text-sm font-medium  rounded-e-lg  ">
                        <svg class="w-4 h-4 text-slate-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </div>
            </div>
            <div class="p-4 ">
                <table class="w-full text-left  text-gray-400 ">
                    <thead class="text-sm text-gray-700 uppercase bg-gray-50 ">
                        <tr>

                            <th scope="col" class=" p-2 ">
                                Référence
                            </th>
                            <th scope="col" class=" p-2 ">
                                Nom (Fr)
                            </th>
                            <th scope="col" class=" p-2 ">
                                Nom (En)
                            </th>
                            <th scope="col" class=" p-2 ">
                                Nom (Nl)
                            </th>
                            <th scope="col" class=" p-2 ">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody id="table-body" class="space-y-7">
                        @foreach ($ingredients as $ingredient)
                            <tr class="bg-white border-b border-gray-100 transition-all duration-300 hover:bg-gray-100">
                                <td class="p-2">
                                    {{ $ingredient->id }}
                                </td>
                                <td class="p-2">
                                    {{ $ingredient->fr_nom }}
                                </td>
                                <td class="p-2">
                                    {{ $ingredient->en_nom }}
                                </td>
                                <td class="p-2 text-[12px]">
                                    {{ $ingredient->nl_nom }}
                                </td>
                                <td class="p-2 flex items-center gap-2 h-15 my-auto">
                                    <button class="drag-handle cursor-grab">
                                        <i class="fa-solid fa-arrows-up-down-left-right text-lg "></i>
                                    </button>
                                    <form id="delete-form-{{ $ingredient->id }}"
                                        action="{{ route('ingredients.destroy', $ingredient->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" onclick="showConfirmModal({{ $ingredient->id }})"
                                            class="cursor-pointer">
                                            <i class="fa-regular fa-trash-can text-lg "></i>
                                        </button>
                                    </form>


                                    <form action="{{ route('ingredients.edit', $ingredient->id) }}" method="GET">
                                        <button class="cursor-pointer">
                                            <i class="fa-solid fa-pencil text-lg "></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
            {{ $ingredients->links() }}
            {{-- ------------------ --}}
        </div>
    </div>

    {{-- model --}}

    {{-- <div id="confirmMdodal" class="fixed  flex items-center justify-center bg-black/50   ">
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/5 text-center ">
            <h2 class="text-xl font-bold text-gray-700 mb-4">Confirmation de suppression</h2>
            <p class="text-gray-600 mb-4">Êtes-vous sûr de vouloir supprimer cet ingrédient ?</p>
            <div class="flex justify-center  gap-2">
                <button id="confirmBtn" class="px-4 py-2 bg-primary  text-white rounded cursor-pointer">Supprimer</button>
                <button id="cancelBtn" class="px-4 py-2 bg-gray-300 text-gray-700 rounded cursor-pointer">Annuler</button>

            </div>
        </div>
        <hr>

    </div> --}}
    <div id="confirmModal"
        class=" hidden fixed inset-0 z-50 flex justify-center items-center w-full md:inset-0  h-screen  bg-black/50">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow-sm ">
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 " aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 ">Êtes-vous sûr de vouloir supprimer cet ingrédient ?</h3>
                    <button id="confirmBtn" type="button"
                        class="text-white bg-primary cursor-pointer  focus:ring-4 focus:outline-none font-bold rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        je suis sûr
                    </button>
                    <button id="cancelBtn" type="button"
                        class="py-2.5 px-5 ms-3 text-sm cursor-pointer font-bold text-gray-500 focus:outline-none bg-white rounded-lg border-2 border-gray-200 ">
                        annuler
                    </button>
                </div>
            </div>
        </div>
    </div>


    {{-- ---------- --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.2/Sortable.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let tableBody = document.getElementById("table-body");
            new Sortable(tableBody, {
                animation: 200,
                handle: ".drag-handle",
                ghostClass: "bg-gray-200",
            });
            let confirmModal = document.getElementById('confirmModal');
            let confirmBtn = document.getElementById('confirmBtn');
            let cancelBtn = document.getElementById('cancelBtn');
            let deleteForm = null;

            function showConfirmModal(ingredientId) {
                deleteForm = document.getElementById(`delete-form-${ingredientId}`);
                confirmModal.classList.remove('hidden');
            }

            confirmBtn.addEventListener('click', function() {
                if (deleteForm) {
                    deleteForm.submit();
                }
            });

            cancelBtn.addEventListener('click', function() {
                confirmModal.classList.add('hidden');
            });

            window.showConfirmModal = showConfirmModal;
        });
    </script>
@endsection
