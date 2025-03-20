@extends('layouts.master')
@section('content')
    @php
        $page = 'ingredients';
    @endphp
    <h2 class="text-[23px] md:text-[26px] text-gray-600 font-light  ">gestion des ingrédients</h2>
    <p class="text-gray-500 text-[10px] md:text-[13px] mt-1">veuillez seléctionnner un thémes pour votre site</p>

    <div class="flex flex-col lg:flex-row mt-12">
        <div class="w-full lg:w-2/6 bg-gray-50  p-4  rounded-md">
            <h2 class="mb-10 w-fit mx-auto text-xl">nouveau ingrédient</h2>
            <form action="" method="post" class=" space-y-3 ">
                <div>
                    <x-input-label value="Nom(fr)" />
                    <x-text-input class="bg-white " />
                </div>
                <div>
                    <x-input-label value="Nom(en)" />
                    <x-text-input class="bg-white " />
                </div>
                <div>
                    <x-input-label value="Nom(ni)" />
                    <x-text-input class="bg-white " />
                </div>
                <div class="flex justify-center">
                    <x-primary-button class="mt-8 mx-auto rounded-lg">ajouter</x-primary-button>
                </div>
            </form>
        </div>
        <div class=" grow">
            <div class="flex flex-col md:flex-row justify-between md:px-5 py-3 md:items-center">
                <h2 class=" w-fit text-[23px] md:text-[26px] text-gray-600 font-light mb-2 md:mt-0">liste des ingrédients</h2>
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
                <table class="w-full text-sm text-left  text-gray-400 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>

                            <th scope="col" class=" p-2 text-[11px] ">
                                Référence
                            </th>
                            <th scope="col" class=" p-2 text-[11px] ">
                                Nom (Fr)
                            </th>
                            <th scope="col" class=" p-2 text-[11px] ">
                                Nom (En)
                            </th>
                            <th scope="col" class=" p-2 text-[11px] ">
                                Nom (Nl)
                            </th>
                            <th scope="col" class=" p-2 text-[11px] ">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="space-y-7 ">
                        @foreach ($ingredients as $ingredient)
                           <tr>
                            <td class="p-2 text-[10px]">
                              {{$ingredient->id}}
                            </td>
                            <td class="p-2 text-[10px]">
                                {{$ingredient->fr_nom}}
                            </td>
                            <td class="p-2 text-[10px]">
                                {{$ingredient->en_nom}}
                            </td>
                            <td class="p-2 text-[12px]">
                                {{$ingredient->nl_nom}}
                            </td>


                            <td class="p-2 h-full my-auto flex items-center justify-between  gap-2">
                                <img src="{{ asset('images/drop.png') }}" class=" w-[15px]  " alt="">
                                <img src="{{ asset('images/delete.png') }}" class=" w-[15px]  " alt="">
                                <img src="{{ asset('images/edite.png') }}" class=" w-[15px]  " alt="">

                            </td>


                        </tr> 
                        @endforeach
                        


                    </tbody>
                </table>
            </div>
            {{$ingredients->links()}}
            {{-- ------------------ --}}
        </div>
    </div>
@endsection
