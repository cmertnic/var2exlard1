@extends('layouts.main')
 
 @section('content') 
 <x-guest-layout>
     <form method="POST" action="{{ route('car.store') }}">
         @csrf
         <h1 class="text-center mb-20 text-5xl"></h1>
         <h1 class="text-center text-blue-500/100 mb-10 text-4xl">Создание машины</h1>
         
             <!-- number -->
             <div class="mt-4">
                 <x-text-input id="number" class="block mt-1 w-full" type="number" name="number" :value="old('number')" required
                     autocomplete="number" placeholder="номер" />
                 <x-input-error :messages="$errors->get('number')" class="mt-2" />
             </div>
             <!-- make -->
             <div class="mt-4">
                 <x-text-input id="make" class="block mt-1 w-full" type="text" name="make" :value="old('make')"
                     required autocomplete="make" placeholder="Марка" />
                 <x-input-error :messages="$errors->get('make')" class="mt-2" />
             </div>
             <!-- model -->
             <div class="mt-4">
                 <x-text-input id="model" class="block mt-1 w-full" type="text" name="model" :value="old('model')"
                     required autocomplete="model" placeholder="Модель" />
                 <x-input-error :messages="$errors->get('model')" class="mt-2" />
             </div>
         <div class="flex items-center justify-end mt-4">
             <x-primary-button class="ms-4">
                 {{ __('Создать машину') }}
             </x-primary-button>
         </div>
     </form>
 </x-guest-layout>
 @endsection      