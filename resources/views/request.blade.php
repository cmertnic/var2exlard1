@extends('layouts.main')

@section('content')
     <x-guest-layout>
         <form action="{{ route('request.store') }}" method="POST">
             @csrf
             <input type="hidden" name="car_id" value="{{ $car->id }}"> 
             <div class="mb-4">
                 <label for="problem" class="block text-gray-700 text-sm font-bold mb-2">Проблема:</label>
                 <input type="text" id="problem" name="problem" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
             </div>
             <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Подать заявку</button>
         </form>
         
     </x-guest-layout>
 @endsection