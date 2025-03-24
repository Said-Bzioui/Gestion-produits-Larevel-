@extends('layouts.master')
@section('content')
    @php
        $page = 'ingredients';
    @endphp
    <h2 class="text-[23px] md:text-[26px] text-gray-600 font-light  ">gestion des ingrédients</h2>
    <p class="text-gray-500 text-[10px] md:text-[13px] mt-1">veuillez seléctionnner un thémes pour votre site</p>

    <div class="flex flex-col lg:flex-row mt-12">
        <div class="w-full lg:w-2/8   ">
            <form action="{{ route('ingredients.store') }}" method="post" class="bg-gray-100 p-4  rounded-md space-y-3 ">
                @csrf
                <h2 class="mb-10 w-fit mx-auto text-xl">nouveau ingrédient</h2>

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
                            <tr class="bg-white border-b text-gray-600 border-gray-100 hover:bg-gray-100">
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
                                    <button class="editBtn cursor-pointer" data-ingredient='@json($ingredient)'>
                                        <i class="fa-solid fa-pencil text-lg "></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                <div id="pagination-links">
                    {{ $ingredients->links() }}
                </div>
            </div>

        </div>
    </div>
    {{-- edite  model --}}
    <div class="editForm hidden fixed top-0 left-0 w-full h-full bg-slate-800/50 flex items-center justify-center z-50">
        <div class="relative bg-gray-50 w-1/3 shadow-2xl p-4 rounded-md">
            <div
                class="closeBtn absolute -right-3 -top-3 bg-primary text-white cursor-pointer w-8 h-8 flex items-center justify-center rounded-full">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <h2 class="mb-10 w-fit mx-auto text-md uppercase">Update CODE PROMO</h2>
            <form id="editForm" method="POST" action="">
                @method('PUT')
                @csrf
                <x-input-error :messages="$errors->all()" />
                <div>
                    <x-input-label value="nom(fr)" />
                    <x-text-input id="editCode" class="bg-white" name="fr_nom" />
                </div>
                <div>
                    <x-input-label value="nom(fr)" />
                    <x-text-input id="editDiscount" class="bg-white" name="en_nom" />
                </div>
                <div>
                    <x-input-label value="nom(fr)" />
                    <x-text-input id="editExpired" class="bg-white" name="nl_nom" />
                </div>
                <div class="flex justify-center">
                    <x-primary-button class="mt-8 mx-auto rounded-lg">Modifier</x-primary-button>
                </div>
            </form>
        </div>
    </div>

    {{-- DELETE COMPONENT --}}
    <x-delete-model itemName="ingredient" />


    {{-- ---------- --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const editBtns = document.querySelectorAll('.editBtn');
            const editForm = document.querySelector('.editForm');
            const closeBtn = document.querySelector('.closeBtn');
            const form = document.getElementById('editForm');

            editBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    const ingredient = btn.dataset.ingredient ? JSON.parse(btn.dataset.ingredient) :
                        null;
                    console.log(ingredient);
                    if (ingredient) {
                        document.getElementById('editCode').value = ingredient.fr_nom;
                        document.getElementById('editDiscount').value = ingredient.en_nom;
                        document.getElementById('editExpired').value = ingredient.nl_nom;
                        form.action = `/ingredients/${ingredient.id}`;
                    }
                    editForm.classList.remove('hidden');
                });
            });

            closeBtn.addEventListener('click', () => {
                editForm.classList.add('hidden');
            });
        });
      // ---------------CONFIRM DELETE-------------
document.addEventListener("DOMContentLoaded", function() {
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
