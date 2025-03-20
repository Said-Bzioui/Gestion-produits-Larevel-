@extends('layouts.Master')
@section('content')
@php
$page = 'produits';
@endphp
    <div class="relative w-80">
        <!-- Selected Items -->
        <div id="selected-container"
            class="border border-gray-300 bg-white rounded px-2 py-1 flex flex-wrap gap-1 min-h-[20px] items-center cursor-pointer"
            >
            <span id="placeholder" class="text-gray-400">Select options...</span>
        </div>

        <!-- Dropdown Options -->
        <div id="dropdown" class="absolute w-full bg-white border border-gray-300 rounded mt-1 shadow-md hidden z-10">
            <ul id="dropdown-list" class="max-h-40 overflow-auto ">
                <li class="p-2 hover:bg-gray-100 cursor-pointer" data-value="Option 1">Option 1</li>
                <li class="p-2 hover:bg-gray-100 cursor-pointer" data-value="Option 2">Option 2</li>
                <li class="p-2 hover:bg-gray-100 cursor-pointer" data-value="Option 3">Option 3</li>
                <li class="p-2 hover:bg-gray-100 cursor-pointer" data-value="Option 4">Option 4</li>
                <li class="p-2 hover:bg-gray-100 cursor-pointer" data-value="Option 5">Option 5</li>
            </ul>
        </div>
    </div>


@endsection
