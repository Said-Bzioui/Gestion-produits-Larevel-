@extends('layouts.Master')

@section('section')
    <div class=" bg-gray-50 min-h-screen w-full flex flex-col">
        <div class="container  mx-auto p-6">
            <div class="bg-white p-4 rounded-xl shadow-md">

                <h1 class="text-[26px] font-Poppins font-light text-gray-800">gestion de contenu</h1>
                <p class="text-[13px] font-Poppins font-normal text-gray-800">veuillez seléctionnner un thémes pour
                    votre site</p>



                {{-- tabs --}}
                <div class="flex justify-between items-center text-sm font-medium text-center text-gray-700   ">
                    <ul class="flex flex-wrap -mb-px" id="tabs">
                        <!-- ACCUEIL -->
                        <li class="me-2">
                            <a href="#ACCUEIL"
                                class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-500 dark:hover:text-gray-500"
                                data-tab="ACCUEIL">
                                ACCUEIL
                            </a>
                        </li>

                        <!-- à propos  -->
                        <li class="me-2">
                            <a href="#propos"
                                class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-500 dark:hover:text-gray-500"
                                data-tab="propos">
                                à propos
                            </a>
                        </li>
                        <!-- contact -->
                        <li class="me-2">
                            <a href="#contact"
                                class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-500 dark:hover:text-gray-500"
                                data-tab="contact">
                                contact
                            </a>
                        </li>
                    </ul>
                </div>


                {{-- contant of tabs --}}

                <div class="mt-4 ">

                    <!-- ACCUEIL-content -->
                    <div id="ACCUEIL-content" class=" px-4">
                        {{-- -----------Gestion des slides------- --}}
                        <div class="  ">
                            <!-- Gestion des slides -->
                            <div class="flex justify-between items-center mb-6">
                                <h1 class="text-2xl font-light text-gray-800 uppercase font-Poppins">Gestion des slides</h1>

                                <!-- Toggle Switch -->
                                <form>
                                    <div class="flex items-center space-x-4">
                                        <label for="slide"
                                            class="bg-gray-200 cursor-pointer relative w-10 h-4 rounded-full flex items-center transition-all duration-700 ease-in-out">
                                            <input type="checkbox" id="slide" class="sr-only peer">
                                            <span
                                                class="w-5 h-5 bg-primary absolute rounded-full left-5 peer-checked:left-0 transition-all duration-700 ease-in-out"></span>
                                            <div class="flex justify-between w-full px-1">
                                                <span class="text-gray-400 text-[12px]">on</span>
                                                <span class="text-gray-400 text-[12px]">off</span>
                                            </div>
                                        </label>
                                        <span class="text-sm font-normal">Activer les slides</span>
                                    </div>
                                </form>
                            </div>

                            <!-- Slide principal -->
                            <div class="relative w-full pt-4">
                                <!-- Image responsive -->
                                <div class="relative w-full ">

                                    <div class="relative">
                                        <img class="slide w-full h-[90vh] rounded-lg object-cover"
                                            src="{{ asset('images/slide1.png') }}" alt="Slide">
                                        @if (!isset($InfoSlides[0]))
                                            <button id="open_popup_ajoute"
                                                class="absolute top-4 right-4 py-2 px-3 text-white bg-primary rounded-full shadow-md z-40 cursor-pointer">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                            {{-- ------------------- popup--ajouter------- --}}

                                            <div id="popup_ajoute" class="fixed inset-0 z-50 hidden">
                                                <div class="bg-gray-100 opacity-90 z-50 h-screen"></div>
                                                <div
                                                    class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-6 rounded-lg shadow-lg w-11/12 max-w-md">
                                                    <div class="py-4 flex justify-between">
                                                        <h2 class="font-[700] text-[15px]">Ajouter content de slide
                                                        </h2>
                                                        <button class="text-primary text-lg cursor-pointer"
                                                            id="close_popup_ajoute">
                                                            <i class="fas fa-close"></i>
                                                        </button>
                                                    </div>
                                                    <form action="" method="POST">
                                                        @csrf
                                                        <div class="w-full">
                                                            <label for="title" class="text-[14px] font-[600] my-2">
                                                                Title</label>
                                                            <input type="text" name="title" id="title"
                                                                placeholder=" Title" value="{{ old('title') }}"
                                                                class="text-[14px] w-full mt-2 p-2 border border-gray-200 rounded-md focus:border-primary focus:ring-2 focus:ring-primary shadow-[inset_0_2px_4px_0_rgba(0,0,0,0.1)]">
                                                            @error('title')
                                                                <div class="text-red-500 text-[12px] mt-1">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="w-full">
                                                            <label for="sous_title" class="text-[14px] font-[600] my-2">Sous
                                                                Title</label>
                                                            <input type="text" name="sous_title" id="sous_title"
                                                                placeholder="sous Title" value="{{ old('sous_title') }}"
                                                                class="w-full mt-2 p-2 border border-gray-200 rounded-md focus:border-primary focus:ring-2 focus:ring-primary shadow-[inset_0_2px_4px_0_rgba(0,0,0,0.1)]">
                                                            @error('sous_title')
                                                                <div class="text-red-500 text-[12px] mt-1">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="w-full">
                                                            <label for="bouton_text" class="text-[14px] font-[600] my-2">
                                                                button text</label>
                                                            <input type="text" name="bouton_text" id="bouton_text"
                                                                placeholder="button text" value="{{ old('bouton_text') }}"
                                                                class="text-[14px] w-full mt-2 p-2 border border-gray-200 rounded-md focus:border-primary focus:ring-2 focus:ring-primary shadow-[inset_0_2px_4px_0_rgba(0,0,0,0.1)]">
                                                            @error('bouton_text')
                                                                <div class="text-red-500 text-[12px] mt-1">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="w-full">
                                                            <label for="bouton_action" class="text-[14px] font-[600] my-2">
                                                                button Action</label>
                                                            <input type="text" name="bouton_action" id="bouton_action"
                                                                placeholder="button Action"
                                                                value="{{ old('bouton_action') }}"
                                                                class="text-[14px] w-full mt-2 p-2 border border-gray-200 rounded-md focus:border-primary focus:ring-2 focus:ring-primary shadow-[inset_0_2px_4px_0_rgba(0,0,0,0.1)]">
                                                            @error('bouton_action')
                                                                <div class="text-red-500 text-[12px] mt-1">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="flex justify-end">
                                                            <button type="submit"
                                                                class="mt-8  px-8 py-1 bg-primary text-white rounded-md  text-[14px]">
                                                                ajouter
                                                            </button>
                                                        </div>
                                                    </form>



                                                </div>
                                            </div>
                                        @else
                                            <!-- Bouton d'édition -->
                                            <button id="open_popup_edit"
                                                class="absolute top-4 right-4 p-2 bg-primary rounded-full shadow-md z-40 cursor-pointer">
                                                <img src="{{ asset('images/light_pen.png') }}" alt="Modifier"
                                                    width="29">
                                            </button>

                                            {{-- ------------------- popup--edit------- --}}

                                            <div id="popup_edit" class="fixed inset-0 z-50 hidden">
                                                <div class="bg-gray-100 opacity-90 z-50 h-screen"></div>
                                                <div
                                                    class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-6 rounded-lg shadow-lg w-11/12 max-w-md">
                                                    <div class="py-4 flex justify-between">
                                                        <h2 class="font-[700] text-[15px]">modefier content de slide
                                                        </h2>
                                                        <button class="text-primary text-lg cursor-pointer"
                                                            id="close_popup_edit">
                                                            <i class="fas fa-close"></i>
                                                        </button>
                                                    </div>
                                                    <form action="" method="POST">
                                                        @csrf
                                                        @method('put')
                                                        <div class="w-full">
                                                            <label for="title" class="text-[14px] font-[600] my-2">
                                                                Title</label>
                                                            <input type="text" name="title" id="title"
                                                                placeholder=" Title"
                                                                class="text-[14px] w-full mt-2 p-2 border border-gray-200 rounded-md focus:border-primary focus:ring-2 focus:ring-primary shadow-[inset_0_2px_4px_0_rgba(0,0,0,0.1)]">
                                                            @error('title')
                                                                <div class="text-red-500 text-[12px] mt-1">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="w-full">
                                                            <label for="sous_title"
                                                                class="text-[14px] font-[600] my-2">Sous
                                                                Title</label>
                                                            <input type="text" name="sous_title" id="sous_title"
                                                                placeholder="sous Title"
                                                                value="{{ $InfoSlides[0]->sous_title }}"
                                                                class="w-full mt-2 p-2 border border-gray-200 rounded-md focus:border-primary focus:ring-2 focus:ring-primary shadow-[inset_0_2px_4px_0_rgba(0,0,0,0.1)]">
                                                            @error('sous_title')
                                                                <div class="text-red-500 text-[12px] mt-1">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="w-full">
                                                            <label for="bouton_text" class="text-[14px] font-[600] my-2">
                                                                button text</label>
                                                            <input type="text" name="bouton_text" id="bouton_text"
                                                                placeholder="button text"
                                                                value="{{ $InfoSlides[0]->bouton_text }}"
                                                                class="text-[14px] w-full mt-2 p-2 border border-gray-200 rounded-md focus:border-primary focus:ring-2 focus:ring-primary shadow-[inset_0_2px_4px_0_rgba(0,0,0,0.1)]">
                                                            @error('bouton_text')
                                                                <div class="text-red-500 text-[12px] mt-1">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="w-full">
                                                            <label for="bouton_action"
                                                                class="text-[14px] font-[600] my-2">
                                                                button Action</label>
                                                            <input type="text" name="bouton_action" id="bouton_action"
                                                                placeholder="button Action"
                                                                value="{{ $InfoSlides[0]->bouton_action }}"
                                                                class="text-[14px] w-full mt-2 p-2 border border-gray-200 rounded-md focus:border-primary focus:ring-2 focus:ring-primary shadow-[inset_0_2px_4px_0_rgba(0,0,0,0.1)]">
                                                            @error('bouton_action')
                                                                <div class="text-red-500 text-[12px] mt-1">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="flex justify-end">
                                                            <button type="submit"
                                                                class="mt-8  px-8 py-1 bg-primary text-white rounded-md  text-[14px]">
                                                                Update
                                                            </button>
                                                        </div>
                                                    </form>



                                                </div>
                                            </div>
                                            <div
                                                class="absolute inset-0 flex flex-col items-center justify-center text-center p-4">
                                                <h4
                                                    class="text-lg md:text-2xl font-medium text-[#9ED1F4] mb-2 leading-tight">

                                                </h4>
                                                <h3 class="text-xl md:text-3xl font-bold text-white mb-4 leading-tight">

                                                </h3>

                                            </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Section des autres slides -->
                            <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mt-6">
                                <!-- Upload d'un nouveau slide -->
                                <form action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <label for="dropzone-file"
                                        class="flex flex-col items-center justify-center w-full h-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer">
                                        <div class="flex flex-col items-center justify-center">
                                            <i class="fas fa-plus"></i>
                                            <p class="mb-2 text-sm text-gray-500"> Nouveau slide</p>
                                            @error('image_slide')
                                                <div class="text-red-500 text-[12px] mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <input id="dropzone-file" type="file" name="image_slide" class="hidden"
                                            onchange="this.form.submit()" />
                                    </label>
                                    <img id="preview" class="mt-2 hidden w-full rounded-lg shadow-md" />
                                </form>

                                <!-- Galerie des slides -->

                                <div class="shadow-md hover:bg-gray-100 transition-all aspect-[4/3] relative">
                                    <img class="slide w-full rounded-lg object-cover" src="{{ asset('storage/') }}"
                                        alt="Slide">

                                    <!-- Bouton de suppression -->
                                    <form action="" method="POST"
                                        class="absolute top-2 right-2 bg-primary  rounded-full ">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Voulez-vous vraiment supprimer ce slide ?')"
                                            class="text-white text-[12px] p-2 cursor-pointer">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>




                            </div>

                        </div>



                        {{-- -----------A props------- --}}
                        <div class="mt-10">
                            <div class="flex justify-between py-8">
                                <h1 class="text-[20px] font-Poppins font-light text-gray-800 uppercase">APROPOS
                                </h1>
                                <form action="">
                                    <div class="flex items-center space-x-4">
                                        <label for="propos"
                                            class="bg-gray-200 cursor-pointer relative w-10 h-4 rounded-full flex items-center transition-all duration-700 ease-in-out">
                                            <input type="checkbox" id="propos" class="sr-only peer">
                                            <span
                                                class="w-5 h-5 bg-primary absolute rounded-full left-5 peer-checked:left-0 transition-all duration-700 ease-in-out"></span>
                                            <div class="flex justify-between w-full px-1">
                                                <span class="text-gray-400 text-[12px]">on</span>
                                                <span class="text-gray-400 text-[12px]">off</span>
                                            </div>
                                        </label>
                                        <span class="text-[10px] font-normal">A propos est activé</span>
                                    </div>
                                </form>
                            </div>
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                                <!-- Image et bouton edit -->
                                <div class="relative flex items-center justify-center">
                                    <img id="image_apropos" src="{{ asset('images/propos.png') }}" alt="Image preview">

                                    <button
                                        class="absolute inset-0 m-auto p-2 bg-primary rounded-full shadow-md w-12 h-12 flex items-center justify-center">
                                        <img src="{{ asset('images/light_pen.png') }}" alt="Modifier" width="29">
                                    </button>
                                </div>


                                <!-- Formulaire -->
                                <form action="{{ route('contenu.store') }}" method="POST" class="px-4"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="image" id="file_aprops">
                                    @error('image')
                                        <div class="text-red-500 text-[12px] mt-1">{{ $message }}</div>
                                    @enderror
                                    <!--  Titre -->
                                    <div class="py-2">
                                        <label for="Titre"
                                            class="block text-sm font-semibold text-gray-600">Titre</label>
                                        <div class="flex gap-4">
                                            <input type="text" name="apropos_titre" id="Titre"
                                                value="{{ old('apropos_titre') }}" placeholder="Titre de A propos"
                                                class="w-full p-2 border border-gray-300 rounded-md focus:border-primary focus:ring-2 focus:ring-primary shadow-sm">
                                            <input type="text" name="apropos_px_titre" placeholder="10px"
                                                value="{{ old('apropos_px_titre') }}"
                                                class="w-[20%] p-2 border border-gray-300 rounded-md focus:border-primary focus:ring-2 focus:ring-primary shadow-sm">
                                            @error('apropos_titre')
                                                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!--  Sous-titre -->
                                    <div class="py-2">
                                        <label for="apropos_sous_titre"
                                            class="block text-sm font-semibold text-gray-600">Sous-titre</label>
                                        <div class="flex gap-4">
                                            <input type="text" name="apropos_sous_titre" id="apropos_sous_titre"
                                                value="{{ old('apropos_sous_titre') }}"
                                                placeholder="Sous-titre de A propos"
                                                class="w-full p-2 border border-gray-300 rounded-md focus:border-primary focus:ring-2 focus:ring-primary shadow-sm">
                                            <input type="text" name="px_sous_titre" placeholder="10px"
                                                value="{{ old('px_sous_titre') }}"
                                                class="w-[20%] p-2 border border-gray-300 rounded-md focus:border-primary focus:ring-2 focus:ring-primary shadow-sm">
                                        </div>
                                    </div>

                                    <!--  Description -->
                                    <div class="py-2">
                                        <label for="Description"
                                            class="block text-sm font-semibold text-gray-600">Description</label>
                                        <textarea placeholder="Description" name="description" id="Description" rows="4"
                                            value="{{ old('description') }}"
                                            class="w-full p-2 border border-gray-300 rounded-md focus:border-primary focus:ring-2 focus:ring-primary shadow-sm resize-y">{{ old('description') }}</textarea>
                                        @error('description')
                                            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Action -->
                                    <div class="py-2">
                                        <div class="flex items-center space-x-4">
                                            <label for="Action"
                                                class="bg-gray-200 cursor-pointer relative w-10 h-4 rounded-full flex items-center transition-all duration-700 ease-in-out">
                                                <input type="checkbox" id="Action" class="sr-only peer">
                                                <span
                                                    class="w-5 h-5 bg-primary absolute rounded-full left-5 peer-checked:left-0 transition-all duration-700 ease-in-out"></span>
                                                <div class="flex justify-between w-full px-1">
                                                    <span class="text-gray-400 text-xs">On</span>
                                                    <span class="text-gray-400 text-xs">Off</span>
                                                </div>
                                            </label>
                                            <span class="text-sm font-normal">Action activer</span>
                                        </div>
                                    </div>

                                    <!--  Bouton -->
                                    <div class="py-2">
                                        <label for="apropos_bouton_text"
                                            class="block text-sm font-semibold text-gray-600">Bouton</label>
                                        <input type="text" name="apropos_bouton_text" id="apropos_bouton_text"
                                            placeholder="Commander" value="{{ old('apropos_bouton_text') }}"
                                            class="w-full p-2 border border-gray-300 rounded-md focus:border-primary focus:ring-2 focus:ring-primary shadow-sm">
                                    </div>

                                    <!--  Lien de l’action -->
                                    <div class="py-2">
                                        <label for="apropos_bouton_action"
                                            class="block text-sm font-semibold text-gray-600">Lien de
                                            l’action</label>
                                        <input type="text" name="apropos_bouton_action" id="apropos_bouton_action"
                                            value="{{ old('apropos_bouton_action') }}" placeholder="Lien de l’action"
                                            class="w-full p-2 border border-gray-300 rounded-md focus:border-primary focus:ring-2 focus:ring-primary shadow-sm">
                                    </div>
                                    <!--  button submit -->

                                    <div class="py-2">
                                        <button type="submit" name="apropos"
                                            class="w-full p-2 bg-primary text-white   rounded-md ">

                                            ajouter
                                        </button>
                                    </div>


                                </form>
                            </div>

                        </div>

                        {{-- -----------catégories------- --}}

                        <div class="mt-10">
                            <div class="flex justify-between py-8">
                                <h1 class="text-[20px] font-Poppins font-light text-gray-800 uppercase">catégories
                                </h1>
                                <form action="">
                                    <div class="flex items-center space-x-4">
                                        <label for="propos"
                                            class="bg-gray-200 cursor-pointer relative w-10 h-4 rounded-full flex items-center transition-all duration-700 ease-in-out">
                                            <input type="checkbox" id="propos" class="sr-only peer">
                                            <span
                                                class="w-5 h-5 bg-primary absolute rounded-full left-5 peer-checked:left-0 transition-all duration-700 ease-in-out"></span>
                                            <div class="flex justify-between w-full px-1">
                                                <span class="text-gray-400 text-[12px]">on</span>
                                                <span class="text-gray-400 text-[12px]">off</span>
                                            </div>
                                        </label>
                                        <span class="text-[10px] font-normal">A propos est activé</span>
                                    </div>
                                </form>
                            </div>

                            {{-- categories --}}
                            <div class="flex px-16 gap-6 w-full">
                                @foreach ($categories as $categorie)
                                    <div class="">
                                        <img src="{{ asset('storage/' . $categorie->image) }}"
                                            alt="{{ $categorie->name }}" class="rounded-full h-30 w-30">
                                        <p class="text-[14px] text-gray-500 text-center py-4">{{ $categorie->nom }}</p>
                                    </div>
                                @endforeach



                            </div>

                            <div class="w-full flex justify-end my-6">
                                <button class="w-[20%] p-2 bg-primary text-white   rounded-full cursor-pointer">
                                    modifier
                                </button>
                            </div>


                        </div>







                    </div>



                    <!-- Contenu pour l'onglet Dessert -->
                    <div id="propos-content" class=" hidden">
                        <h2 class="text-xl font-bold mb-4">propos</h2>
                        <p>Liste des contacts et informations de communication.</p>
                    </div>
                    <!-- Contenu pour l'onglet Dessert -->
                    <div id="contact-content" class=" hidden">
                        <h2 class="text-xl font-bold mb-4">contact</h2>
                        <p>Liste des contacts et informations de communication.</p>
                    </div>
                </div>



            </div>
        </div>

    </div>

@endsection
