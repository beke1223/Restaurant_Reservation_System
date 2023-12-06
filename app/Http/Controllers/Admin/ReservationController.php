<?php

namespace App\Http\Controllers\Admin;

use App\Enum\TableStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
use App\Models\Reservation;
use App\Models\Table;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use Illuminate\Http\Request;
use Carbon\Carbon;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservation = Reservation::all();
        return view('admin.reservation.index', compact('reservation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tables = Table::where('status', TableStatusEnum::Available)->get();
        return view('admin.reservation.create', compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationStoreRequest $request)
    {

        $table = Table::findOrFail($request->table_id);

        if ($request->guest_number > $table->guest_number) {
            return back()->with('warning', 'Please Choose the table based on the guest number .');
        }
        // Reservation::create([
        //     'first_name' => $request->first_name,
        //     'last_name' => $request->last_name,
        //     'email' => $request->email,
        //     'tel_number' => $request->tel_number,
        //     'res_date' => $request->res_date,
        //     'table_id' => $request->table_id,
        //     'guest_number' => $request->guest_number,

        // ]);
        Reservation::create($request->validated());
        return to_route('admin.reservation.index')->with('success', 'Reservation created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {

        $tables = Table::where('status', TableStatusenum::Available)->get();
        return view('admin.reservation.edit', compact('reservation', 'tables'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReservationStoreRequest $request, Reservation $res)
    {

        $reservation = Reservation::findOrFail($request->id);
      

        $table = Table::findOrFail($request->table_id);
        if ($request->guest_number > $table->guest_number) {
            return back()->with('warning', 'Please choose the table based on guests.');
        }
        $request_date = Carbon::parse($request->res_date);
        $reservations = $table->reservations()->where('id', '!=', $res->id)->get();
        foreach ($reservations as $existingReservation) {
            $existingDate = Carbon::parse($existingReservation->res_date);
            if ($existingDate->format('Y-m-d') == $request_date->format('Y-m-d')) {
                return back()->with('warning', 'This table is reserved for this date.');
            }
        }

        $request->validate([
            'first_name'=>['required'],
            'last_name'=>['required'],
            'email'=>['required','email'],
            'tel_number'=>['required'],
            'res_date'=>['required','date',new DateBetween,new TimeBetween],
            'guest_number'=>['required'],
            'table_id'=>['required'],

        ]);

        $res->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'tel_number' => $request->tel_number,
            'res_date' => $request->res_date,
            'table_id' => $request->table_id,
            'guest_number' => $request->guest_number,
        ]);
        // $validation=$request->validated();
        // // dd($validation);
        // $res->update($validation);

        

        return to_route('admin.reservation.index')->with('success', 'Reservation updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $res)
    { 
        $res->delete();
        return to_route('admin.reservation.index')->with('warning', 'Reservation deleted successfully');
    }
}
