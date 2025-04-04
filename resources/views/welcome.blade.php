@extends('layouts.main')

@section('content')
    <a href="{{ route('car.create') }}">
        <button class="bg-blue-500/100 rounded text-white p-3 pl-4 pr-4 m-9 hover:bg-blue-700/100 transition">Добавить
            авто</button>
    </a>
    <h1 class="text-center mb-4 text-2xl">Мои автомобили</h1>
    @if ($cars->isEmpty())
        <p class="text-center">У вас нет автомобиля.</p>
    @else
        @foreach ($cars as $car)
            <x-car-card :car="$car" />
        @endforeach

        {{ $cars->links() }}
    @endif
@endsection
