@extends('layouts.master')
@section('content')
    @php
        $page = 'promos';
    @endphp
    <h2 class="text-[23px] md:text-[26px] text-gray-600 font-light  ">codes promos</h2>
    <p class="text-gray-500 text-[10px] md:text-[13px] mt-1">veuillez seléctionnner un thémes pour votre site</p>

    <div class="flex flex-col lg:flex-row mt-12">
        <div class="w-full lg:w-2/8 bg-gray-50  p-4  rounded-md">
            <h2 class="mb-10 w-fit mx-auto text-md uppercase">nouveau CODE PROMO</h2>
            <form action="{{ route('promo.store') }}" method="post" class=" space-y-3 ">
                @csrf
                <div>
                    <x-input-label value="Code promo" />
                    <x-text-input class="bg-white " name='code' />
                </div>
                <div>
                    <x-input-label value="discount" />
                    <x-text-input class="bg-white " name='discount' />
                </div>
                <div>
                    <x-input-label value="Expired_at" />
                    <x-text-input class="bg-white " name='expired_at' />
                </div>
                <div class="flex justify-center">
                    <x-primary-button class="mt-8 mx-auto rounded-lg">ajouter</x-primary-button>
                </div>
            </form>
        </div>
        <div class=" grow">
            <div class="flex flex-col md:flex-row justify-end md:px-5 py-3 md:items-center">
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
                                Code promo
                            </th>
                            <th scope="col" class=" p-2 ">
                                Discount
                            </th>
                            <th scope="col" class=" p-2 ">
                                expired_at
                            </th>
                            <th scope="col" class=" p-2 ">
                                active
                            </th>
                            <th scope="col" class=" p-2 ">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody id="table-body" class="space-y-7">
                        @foreach ($promos as $promo)
                            <tr class="bg-white border-b text-gray-600 border-gray-100 hover:bg-gray-100">
                                <td class="p-2">
                                    {{ $promo->id }}
                                </td>
                                <td class="p-2">
                                    {{ $promo->code }}
                                </td>
                                <td class="p-2">
                                    {{ $promo->discount }}%
                                </td>
                                <td class="p-2 text-[14px]">
                                    {{ $promo->expired_at->format('Y-m-d') }}
                                </td>
                                <td class="p-2 text-[12px]">
                                    <span class="text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm">
                                        @if ($promo->active == '1')
                                            <i class="fa-solid fa-circle-check text-xl text-green-700"></i>
                                        @else
                                            <i class="fa-solid fa-circle-xmark text-xl text-red-700"></i>
                                        @endif
                                    </span>
                                </td>
                                <td class="p-2 flex items-center gap-2">
                                    <button class="drag-handle cursor-grab">
                                        <i class="fa-solid fa-arrows-up-down-left-right text-lg "></i>
                                    </button>
                                    <form id="delete-form-{{ $promo->id }}"
                                        action="{{ route('promo.destroy', $promo->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="cursor-pointer "
                                            onclick="showConfirmModal({{ $promo->id }})">
                                            <i class="fa-regular fa-trash-can text-lg "></i> </button>
                                    </form>

                                    <button class="editBtn cursor-pointer" data-promo='@json($promo)'>
                                        <i class="fa-solid fa-pencil text-lg "></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                <div id="pagination-links">
                    {{ $promos->links() }}
                </div>
            </div>
        </div>
    </div>
    {{-- DELETE COMPONENT --}}
    <x-delete-model itemName="code promo" />

    {{-- Edit Model --}}
    <div class="editForm hidden fixed inset-0 bg-slate-800/50 flex items-center justify-center z-50">
        <div class="relative bg-white w-full max-w-lg shadow-2xl p-6 rounded-lg">
            <div
                class="closeBtn absolute -right-4 -top-4 bg-red-500 text-white cursor-pointer w-10 h-10 flex items-center justify-center rounded-full shadow-md hover:bg-red-600 transition">
                <i class="fa-solid fa-xmark text-lg"></i>
            </div>
            <h2 class="mb-6 text-center text-lg font-semibold uppercase text-gray-700">Update CODE PROMO</h2>
            <form id="editForm" method="POST" action="">
                @method('PUT')
                @csrf
                <x-input-error :messages="$errors->all()" />
                <div class="mb-4">
                    <x-input-label value="Code promo" class="text-gray-600 font-medium" />
                    <x-text-input id="editCode" class="w-full  p-2  " name="code" />
                </div>
                <div class="mb-4">
                    <x-input-label value="Discount" class="text-gray-600 font-medium" />
                    <x-text-input id="editDiscount" class="w-full " name="discount" />
                </div>
                <div class="mb-4">
                    <x-input-label value="Expired_at" class="text-gray-600 font-medium" />
                    <x-text-input id="editExpired" class="w-full " name="expired_at" />
                </div>
                <div class="mb-4">
                    <x-input-label value="Active" class="text-gray-600 font-medium" />
                    <select id="editActive" name="active"
                        class="w-full  border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="1">Activer</option>
                        <option value="0">Désactiver </option>
                    </select>
                </div>
                <div class="flex justify-center">
                    <x-primary-button
                        class="mt-6 px-6 py-2  text-white rounded-lg shadow-md hover:bg-primary/80 transition">Modifier</x-primary-button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const editBtns = document.querySelectorAll('.editBtn');
            const editForm = document.querySelector('.editForm');
            const closeBtn = document.querySelector('.closeBtn');
            const form = document.getElementById('editForm');

            editBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    const promo = btn.dataset.promo ? JSON.parse(btn.dataset.promo) : null;
                    console.log(promo);
                    if (promo) {
                        document.getElementById('editCode').value = promo.code;
                        document.getElementById('editDiscount').value = promo.discount;
                        document.getElementById('editExpired').value = new Date(promo.expired_at).toISOString().split('T')[0];
                        document.getElementById('editActive').value = promo.active;
                        form.action = `/promo/${promo.id}`;
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

            function showConfirmModal(itemId) {
                deleteForm = document.getElementById(`delete-form-${itemId}`);
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
