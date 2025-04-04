<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Request2;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ReportController extends Controller
{
    private function isAdmin()
    {
        return Auth::check() && Auth::user()->role === 'admin';
    }
    public function adminIndex()
    {
        if (!$this->isAdmin()) {
            abort(403, 'Недостаточно полномочий для доступа к этой странице.');
        }

        $request2s = Request2::with('user', 'car')->paginate(10);
        $cars = Car::all();

        return view('admin', compact('request2s', 'cars'));
    }
    public function updateRepairDate(Request $request, $id)
    {
        if (!$this->isAdmin()) {
            abort(403, 'Недостаточно полномочий для доступа к этой странице.');
        }

        $request->validate([
            'repair_date' => 'nullable|date',
        ]);

        $request2 = Request2::findOrFail($id);

        $request2->repair_date = $request->input('repair_date');
        $request2->save();

        return redirect()->route('admin.index')->with('success', 'Дата ремонта обновлена успешно!');
    }
    public function updateStatus(Request $request, $id)
    {
        $request2 = Request2::findOrFail($id);
        $request2->car_id = $request->input('status_id');
        $request2->save();

        return response()->json(['success' => true]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
        ]);

        $request2 = Request2::findOrFail($id);
        $request2->car_id = $request->car_id;
        $request2->save();

        return redirect()->route('admin.index')->with('success', 'Статус обновлён успешно!');
    }

    public function Carindex()
    {
        $cars = Car::where('user_id', Auth::id())->paginate(10);

        return view('car', compact('cars'));
    }

    public function Carcreate()
    {
        $cars = Car::all();

        return view('car', compact('cars'));
    }

    public function Carstore(Request $request)
    {
        $data = $request->validate([
            'number' => 'required|int',
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
        ]);



        Car::create([
            'number' => $data['number'],
            'make' => $data['make'],
            'model' => $data['model'],
            'user_id' => Auth::id(),
        ]);

        Log::info('car created successfully.');

        return redirect('/')->with('message', 'Создание заявки успешно!');
    }

    public function index()
    {
        $cars = Car::where('user_id', Auth::id())->paginate(10);
        $request2s = Request2::where('user_id', Auth::id())->paginate(10);

        return view('welcome', [
            'request2s' => $request2s,
            'cars' => $cars
        ]);
    }


    public function create($car_id)
    {
        $car = Car::findOrFail($car_id);
        return view('request', compact('car'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'problem' => 'required|string|max:255',
            'car_id' => 'required|exists:cars,id',
        ]);

        Request2::create([
            'problem' => $data['problem'],
            'repair_date' => '2000-01-01',
            'car_id' => $data['car_id'],
            'user_id' => Auth::id(),
        ]);

        Log::info('request2 created successfully.');

        return redirect('/')->with('message', 'Создание заявки успешно!');
    }
}
