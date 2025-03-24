@props(['itemName'])
<div id="confirmModal"
    class=" hidden fixed inset-0 z-50 flex justify-center items-center w-full md:inset-0  h-screen  bg-black/50">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow-sm ">
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 ">Êtes-vous sûr de vouloir supprimer cet <strong>{{$itemName}}</strong> ?
                </h3>
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
