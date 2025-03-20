@extends('layouts.master')
@section('content')
    @php
        $page = 'categorie';
    @endphp
    <h2 class="text-[23px] md:text-[26px] text-gray-600 font-light   ">gestion des Categories</h2>
    <p class="text-gray-500 text-[10px] md:text-[13px] mt-1">veuillez seléctionnner un thémes pour votre site</p>
    {{-- filtters --}}
    <div class="flex items-start md:items-center flex-col md:flex-row justify-between  mt-10 ">
        <div>
        </div>
        <div class="flex flex-col-reverse w-full md:w-fit sm:flex-row items-end md:items-center justify-center gap-2">
            <form class="flex gap-2">
                <div class="relative w-full border-1 border-gray-300 rounded-md   overflow-hidden  ">
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
                <select id="language"
                    class=" border border-gray-300 text-gray-900 text-sm rounded-lg block  p-2.5   inset-shadow-lg  ">
                    <option selected>FR</option>
                    <option value="US">EN</option>
                    <option value="CA">AR</option>
                </select>
            </form>
            <a href="{{route('categories.create')}}" type="button"
                class="text-white flex items-center bg-primary hover:bg-primary  font-medium rounded-lg text-sm px-5 py-2.5 ">
                <img class=" cursor-pointer mr-3 " src="{{ asset('images/plus.png') }}">
                nouvelle catégorie
            </a>
        </div>
    </div>
    <div class="relative px-3 mt-5 overflow-x-auto tab-panel  rounded-lg " id="all">
        <table class="w-full text-sm text-left  text-gray-400 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                <tr>
                    <th scope="col" class=" p-4 text-[11px] ">
                        image
                    </th>

                    <th scope="col" class=" p-4 text-[11px] ">
                        Nom
                    </th>
                    <th scope="col" class=" p-4 text-[11px] ">
                        Description
                    </th>
                    <th scope="col" class=" p-4 text-[11px] ">
                        Meta Title
                    </th>
                    <th scope="col" class=" p-4 text-[11px] ">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="">
                @foreach ($categories as $categorie)
                <tr class="   border-b  border-gray-300">
                    <td scope="row" class="p-2 font-medium text-gray-900 whitespace-nowrap ">
                        <img src="{{ asset('images/plate.png') }}" class="rounded-full " alt="">
                    </td>
                    <td class="p-2 text-[13px]">
                        {{$categorie->nom}}
                    </td>
                    <td class="p-2 text-[13px]">
                        {{$categorie->disc}}

                    </td>

                    <td class="p-2 text-[13px]">
                        {{$categorie->m_title}}

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
        {{-- pagination --}}
        {{ $categories->links() }}
    </div>
@endsection
