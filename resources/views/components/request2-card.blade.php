<div class="flex justify-center items-center bg-gray-100">
    <div class="bg-white shadow-md rounded-lg p-4 max-w-md w-full mb-2">
        <h2 class="font-bold text-xl mb-2">Заявка от {{ $request2->created_at ? $request2->created_at->format('d.m.Y') : 'Неизвестное время' }}</h2>
        
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
    </div>
</div>