@extends('layouts.master')
@section('content')
    @php
        $page = 'categorie';
    @endphp

    <h2 class="text-[23px] md:text-[26px] text-gray-600 font-light">gestion des Categories</h2>
    <p class="text-gray-500 text-[10px] md:text-[13px] mt-1">veuillez seléctionnner un thémes pour votre site</p>

    {{-- filtters --}}
    <div class="flex items-start md:items-center flex-col md:flex-row justify-end mt-10">

        <div class="flex flex-col-reverse w-full md:w-fit sm:flex-row items-end md:items-center justify-center gap-2">
            <form class="flex gap-2">
                <div class="relative w-full border-1 border-gray-300 rounded-md overflow-hidden">
                    <input type="text" id="search-box"
                        class="block p-2.5 pe-10 w-full z-20 text-sm text-gray-400 outline-none inset-shadow-lg"
                        placeholder="Search ..." value="{{ request('search') }}" required />
                    <button type="submit" class="absolute top-0 end-0 h-full p-2.5 text-sm font-medium rounded-e-lg">
                        <svg class="w-4 h-4 text-slate-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </div>
                <select id="language"
                    class=" border border-gray-300 text-gray-900 text-sm rounded-lg block  p-2.5   inset-shadow-lg  ">
                    <option selected>FR</option>
                    <option value="US">EN</option>
                    <option value="CA">AR</option>
                </select>
            </form>
            <a href="{{ route('categories.create') }}" type="button"
                class="text-white flex items-center bg-primary hover:bg-primary  font-medium rounded-lg text-sm px-5 py-2.5 ">
                <img class=" cursor-pointer mr-3 " src="{{ asset('images/plus.png') }}">
                nouvelle catégorie
            </a>
        </div>
    </div>


    <div class="relative px-3 mt-5 overflow-x-auto tab-panel rounded-lg" id="categories-table">
        <table class="w-full text-sm text-left text-gray-600">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="p-4 text-[11px]">image</th>
                    <th scope="col" class="p-4 text-[11px]">Nom</th>
                    <th scope="col" class="p-4 text-[11px]">Description</th>
                    <th scope="col" class="p-4 text-[11px]">Meta Title</th>
                    <th scope="col" class="p-4 text-[11px]">Actions</th>
                </tr>
            </thead>
            <tbody id="table-body">
                @foreach ($categories as $categorie)
                    <tr class="border-b border-gray-300">
                        <td scope="row" class="p-2 font-medium text-gray-900 whitespace-nowrap">
                            <img src="{{ asset('images/plate.png') }}" class="rounded-full" alt="">
                        </td>
                        <td class="p-2 text-[13px]">{{ $categorie->nom }}</td>
                        <td class="p-2 text-[13px]">{{ $categorie->disc }}</td>
                        <td class="p-2 text-[13px]">{{ $categorie->m_title }}</td>
                        <td class="p-2 flex items-center gap-2 h-15 my-auto">
                            <button class="drag-handle cursor-grab">
                                <i class="fa-solid fa-arrows-up-down-left-right text-xl"></i>
                            </button>
                            <form id="delete-form-{{ $categorie->id }}"
                                action="{{ route('categories.destroy', $categorie->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="button" onclick="showConfirmModal({{ $categorie->id }})"
                                    class="cursor-pointer">
                                    <i class="fa-regular fa-trash-can text-xl "></i>
                                </button>
                            </form>
                            <form action="{{ route('categories.edit', $categorie->id) }}" method="GET">
                                <button class="cursor-pointer">
                                    <i class="fa-solid fa-pencil text-xl "></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div id="pagination-links">
            {{ $categories->links() }}
        </div>
    </div>

    {{-- model --}}
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
                    <h3 class="mb-5 text-lg font-normal text-gray-500 ">Êtes-vous sûr de vouloir supprimer cet Categorie ?</h3>
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


    <script>
        $(document).ready(function() {
            $('#search-box').on('keyup', function() {
                var search = $(this).val();

                $.ajax({
                    url: '{{ route('categories.index') }}',
                    method: 'GET',
                    data: {
                        search: search
                    },
                    success: function(response) {
                        $('#categories-table').html($(response).find('#categories-table')
                            .html());
                    }
                });
            });
        });
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
