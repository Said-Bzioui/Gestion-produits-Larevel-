@extends('layouts.master')
@section('content')
    @php
        $page = 'categorie';
    @endphp
    <h2 class="text-[26px] text-gray-600 font-light  ">nouvelle catégorie</h2>
    <a href="{{ route('categories.index') }}" class="text-gray-500 text-[13px] mt-1">
        < retour </a>

            <div class="flex items-center justify-center  lg:space-x-12 ml-7">
                <div class="w-72  h-72 hidden  rounded-full bg-gray-200 lg:flex items-center justify-center">
                    <img class=" cursor-pointer h-full " src="{{ asset('images/plate2.png') }}">
                </div>
                <div class=" grow  p-5">
                    <form action="" method="post">
                        <div class="my-6 space-y-1">
                            <x-input-label value='Nom' />
                            <x-text-input placeholder="nom" />
                        </div>
                        <div class="my-6 space-y-1">
                            <x-input-label value='Discription' />
                            <x-texterea />

                        </div>
                        <div class="my-6 space-y-1">
                            <x-input-label value='Meta Title' />
                            <x-text-input placeholder="meta title" />
                        </div>
                        <div class="my-6 space-y-5 flex flex-col">
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" value="" class="sr-only peer ">
                                <div
                                    class="relative w-11 h-6 bg-gray-200 rounded-full  peer  peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-primary after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all   ">
                                </div>
                                <span class="ms-3 text-sm font-medium    text-gray-500 ">Afficher dans le menu</span>
                            </label>
                            <x-primary-button>ajouter</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        @endsection
