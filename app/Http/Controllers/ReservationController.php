<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use OpenApi\Annotations as OA;

class ReservationController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/reservations",
     *     summary="Obtener todas las reservas",
     *     tags={"Reservations"},
     *     @OA\Response(
     *         response=200,
     *         description="Listado de reservas",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Reservation"))
     *     )
     * )
     */
    public function index()
    {
        return Reservation::all();
    }

    public function create(Room $room)
    {
        return view('reservations.create', compact('room'));
    }

    public function store(Request $request, Room $room)
    {
        $request->validate([
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
        ]);

        Reservation::create([
            'user_id' => Auth::id(),
            'room_id' => $room->id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
        ]);

        return redirect()->route('my.reservations')->with('success', 'Reserva realizada correctamente.');
    }

    public function myReservations()
    {
        $reservations = Reservation::where('user_id', Auth::id())->with('room')->get();
        return view('reservations.my', compact('reservations'));
    }

    public function allReservations()
    {
        $reservations = Reservation::with('user', 'room')->get();
        return view('reservations.index', compact('reservations'));
    }
}
