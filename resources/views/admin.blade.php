@extends('layouts.main')

@section('content')
    <h1 class="text-center mb-4 text-2xl">Админка</h1>
    @if ($request2s->isEmpty())
        <p class="text-center">Нет заявок</p>
    @else
        @foreach ($request2s as $request2)
            <x-admin-card :request2="$request2" />
        @endforeach

        {{ $request2s->links() }}
    @endif
@endsection
