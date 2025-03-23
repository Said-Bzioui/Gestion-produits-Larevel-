@extends('layouts.master')
@section('content')
    @php
        $page = 'ingredients';
    @endphp
    <h2 class="text-[23px] md:text-[26px] text-gray-600 font-light  ">gestion des ingrédients</h2>
    <p class="text-gray-500 text-[10px] md:text-[13px] mt-1">veuillez seléctionnner un thémes pour votre site</p>
    <div class="w-full lg:w-3/8 mx-auto bg-gray-50  p-4  rounded-md">
        <h2 class="mb-10 w-fit mx-auto text-xl">Modifier ingrédient</h2>
        <form action="{{route('ingredients.store')}}" method="post" class=" space-y-3 ">
            @csrf
            <div>
                <x-input-label value="Nom(fr)" />
                <x-text-input class="bg-white " name="fr_nom" value='{{$ingredient->fr_nom}}' />
            </div>
            <div>
                <x-input-label value="Nom(en)" />
                <x-text-input class="bg-white " name="en_nom" value='{{$ingredient->en_nom}}' />
            </div>
            <div>
                <x-input-label value="Nom(ni)" />
                <x-text-input class="bg-white " name="nl_nom" value='{{$ingredient->nl_nom}}'/>
            </div>
            <div class="flex justify-center">
                <x-primary-button class="mt-8 mx-auto rounded-lg">Modifier</x-primary-button>
            </div>
        </form>
    </div>
@endsection
