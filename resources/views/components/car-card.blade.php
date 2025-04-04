<div class="flex justify-center items-center bg-gray-100">
    <div class="bg-white shadow-md rounded-lg p-4 max-w-md w-full mb-2">
        <h2 class="font-bold text-xl mb-2">Авто от {{ $car->created_at ? $car->created_at->format('d.m.Y') : 'Неизвестное время' }}</h2>
        <p><strong>номер:</strong> {{ $car->number }}</p>
        <p><strong>марка:</strong> {{ $car->make }}</p>
        <p><strong>модель:</strong> {{ $car->model }}</p>
        <a href="{{ route('request.create', ['car_id' => $car->id]) }}">
            <button class="bg-blue-500/100 rounded text-white p-3 pl-4 pr-4 ml-[100px] m-9 hover:bg-blue-700/100 transition">Подать заявку на ремонт</button>
        </a>
    </div>
</div>