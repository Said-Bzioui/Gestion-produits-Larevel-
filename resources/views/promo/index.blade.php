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
                <table class="w-full text-sm text-left   ">
                    <thead class="text-md  text-gray-600 uppercase bg-gray-50 ">
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
                    <tbody class="space-y-7 ">
                        @foreach ($promos as $promo)
                            <tr class="text-gray-500 ">
                                <td class="p-2">{{ $promo->id }}</td>
                                <td class="p-2">{{ $promo->code }}</td>
                                <td class="p-2">{{ $promo->discount }}%</td>
                                <td class="p-2">{{ $promo->expired_at->format('d-m-Y') }}</td>
                                <td class="p-2  ">
                                    <span
                                        class="@if ($promo->active == '1') bg-green-100 text-green-800 @else bg-red-100 text-red-800 @endif  text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm">{{ $promo->active == '1' ? 'Y' : 'N' }}</span>
                                </td>
                                <td class="p-2 flex items-center gap-2">
                                    <form action="{{ route('promo.destroy', $promo->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="cursor-pointer ">
                                            <img src="{{ asset('images/delete.png') }}" class="w-[13px]" alt="">
                                        </button>
                                    </form>
                                    <button class="editBtn cursor-pointer" data-promo='@json($promo)'>
                                        <img src="{{ asset('images/edite.png') }}" class="w-[13px]" alt="">
                                    </button>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $promos->links() }}

            </div>
            {{-- ------------------ --}}
        </div>
    </div>
    {{--edite  model --}}
    <div class="editForm hidden fixed top-0 left-0 w-full h-full bg-slate-800/50 flex items-center justify-center z-50">
        <div class="relative bg-gray-50 w-1/3 shadow-2xl p-4 rounded-md">
            <div class="closeBtn absolute -right-3 -top-3 bg-primary text-white cursor-pointer w-8 h-8 flex items-center justify-center rounded-full">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <h2 class="mb-10 w-fit mx-auto text-md uppercase">Update CODE PROMO</h2>
            <form id="editForm" method="POST" action="">
                @method('PUT')
                @csrf
                <x-input-error :messages="$errors->all()" /> 
                <div>
                    <x-input-label value="Code promo" />
                    <x-text-input id="editCode" class="bg-white" name="code" />
                </div>
                <div>
                    <x-input-label value="Discount" />
                    <x-text-input id="editDiscount" class="bg-white" name="discount" />
                </div>
                <div>
                    <x-input-label value="Expired_at" />
                    <x-text-input id="editExpired" class="bg-white" name="expired_at" />
                </div>
                <div>
                    <x-input-label value="Active" />
                    <select id="editActive" name="active">
                        <option value="1">Active</option>
                        <option value="0">Non Active</option>
                    </select>
                </div>
                <div class="flex justify-center">
                    <x-primary-button class="mt-8 mx-auto rounded-lg">Modifier</x-primary-button>
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
                        document.getElementById('editExpired').value =  new Date(promo.expired_at).toISOString().split('T')[0];
                        document.getElementById('editActive').value = promo.active;
                        form.action =`/promo/${promo.id}`; 
                    }
                    editForm.classList.remove('hidden');
                });
            });

            closeBtn.addEventListener('click', () => {
                editForm.classList.add('hidden');
            });
        });
    </script>
@endsection
