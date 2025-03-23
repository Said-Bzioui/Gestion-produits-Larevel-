@extends('layouts.Master')
@section('content')
    @php
        $page = 'content';
    @endphp
    <h2 class="text-[23px] md:text-[26px] text-gray-600 font-light  ">gestion de contenu</h2>
    <p class="text-gray-500 text-[10px] md:text-[13px] mt-1">veuillez seléctionnner un thémes pour votre site</p>
    <div class="  font-medium text-center   mt-8  ">
        <ul class="flex items-center space-x-12 text-lg uppercase" id="tabs">
            <!-- ACCUEIL -->
            <li class="">
                <a href="#ACCUEIL"
                    class=" p-2 border-b-4 border-primary rounded-t-lg hover:text-gray-600 hover:border-primary "
                    data-tab="ACCUEIL">
                    Accueil
                </a>
            </li>

            <!-- à propos  -->
            <li class="">
                <a href="#propos"
                    class=" p-2 border-b-4 border-transparent rounded-t-lg hover:text-gray-600 hover:border-primary "
                    data-tab="propos">
                    à propos
                </a>
            </li>
            <!-- contact -->
            <li class="">
                <a href="#contact"
                    class=" p-2 border-b-4 border-transparent rounded-t-lg hover:text-gray-600 hover:border-primary "
                    data-tab="contact">
                    contact
                </a>
            </li>
        </ul>
    </div>
    <div class="flex">
        <h2 class="text-lg mt-12 text-gray-600 font-light uppercase ">gestion des slides</h2>
    </div>
    <div class="bg-green-200">
        <div class=" h-[24rem] relative bg-red-200 rounded-md">

        </div>
        <div class="grid grid-cols-6 space-x-2 m-2 ">
            <div class="bg-yellow-200 h-32 rounded-md  flex items-center text-lg  justify-center flex-col  ">
                <span class="text-4xl ">+</span>
                <span>Nouveau slide</span>
            </div>
            <div class="bg-yellow-200 h-32 rounded-md   "></div>
            <div class="bg-yellow-200 h-32 rounded-md   "></div>
            <div class="bg-yellow-200 h-32 rounded-md   "></div>
            <div class="bg-yellow-200 h-32 rounded-md   "></div>
            <div class="bg-yellow-200 h-32 rounded-md   "></div>
        </div>

    </div>
@endsection
