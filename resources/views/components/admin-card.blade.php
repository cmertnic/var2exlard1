<div class="bg-white shadow-md rounded-lg p-4 mb-4">
    <h2 class="font-bold text-xl mb-2">Заявка от {{ $request2->created_at ? $request2->created_at->format('d.m.Y') : 'Неизвестное время' }}</h2>

    <h3 class="font-bold text-lg mb-2">Информация о клиенте:</h3>
    <p><strong>Имя клиента:</strong> {{ $request2->user->name }}</p>

    <h3 class="font-bold text-lg mb-2">Информация о машине:</h3>
    <p><strong>Номер:</strong> {{ $request2->car->number }}</p>
    <p><strong>Марка:</strong> {{ $request2->car->make }}</p>
    <p><strong>Модель:</strong> {{ $request2->car->model }}</p>

    <h3 class="font-bold text-lg mt-4 mb-2">Информация о заявке:</h3>
    <p><strong>Проблема:</strong> {{ $request2->problem }}</p>
    <p>
        <strong>Дата ремонта:</strong> 
        @if ($request2->repair_date)
            @php
                $repairDate = \Carbon\Carbon::parse($request2->repair_date);
            @endphp
            
            {{ $repairDate->format('d.m.Y') === '01.01.2000' ? 'Не установлена' : $repairDate->format('d.m.Y') }}
        @else
            Не указана
        @endif
    </p>

    <h3 class="font-bold text-lg mt-4 mb-2">Установить дату ремонта:</h3>
    <form action="{{ route('reports.updateRepairDate', $request2->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="repair_date_{{ $request2->id }}" class="block text-sm font-medium text-gray-700">Дата ремонта:</label>
            <input type="date" name="repair_date" id="repair_date_{{ $request2->id }}" 
                   value="{{ $request2->repair_date ? \Carbon\Carbon::parse($request2->repair_date)->format('Y-m-d') : '' }}" 
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Сохранить</button>
    </form>
    
</div>