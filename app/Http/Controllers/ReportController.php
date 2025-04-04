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

        $request2s = Request2::paginate(10);
        $cars = Car::all();

        return view('admin', compact('request2s', 'cars'));
    }

    public function updateStatus(Request $request, $id)
    {
        $report = Request2::findOrFail($id);
        $report->cars_id = $request->input('status_id');
        $report->save();

        return response()->json(['success' => true]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'cars_id' => 'required|exists:cars,id',
        ]);

        $report = Request2::findOrFail($id);
        $report->cars_id = $request->cars_id;
        $report->save();

        return redirect()->route('admin.index')->with('success', 'Статус обновлён успешно!');
    }



    public function index()
    {
        $request2s = Request2::where('user_id', Auth::id())->paginate(10);
        return view('welcome', ['request2s' => $request2s]);
    }

    public function create()
    {

        $cars = Car::all();

        return view('request', compact('cars')); 
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'problem' => 'required|string|max:255',
            'car_id' => 'required|exists:cars,id', 
        ]);



        Request2::create([
            'problem' => $data['problem'],
            'repair_date' =>'2000-01-01',
            'car_id' => $data['car_id'],
            'user_id' => Auth::id(),
        ]);

        Log::info('Report created successfully.');

        return redirect('/')->with('message', 'Создание заявки успешно!');
    }
}
