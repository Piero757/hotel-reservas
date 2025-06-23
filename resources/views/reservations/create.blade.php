<x-app-layout>
    <x-slot name="header">Reservar habitación: {{ $room->name }}</x-slot>

    <form method="POST" action="{{ route('reservations.store', $room) }}">
        @csrf
        <div>
            <label>Fecha de ingreso:</label>
            <input type="date" name="check_in" required>
        </div>
        <div>
            <label>Fecha de salida:</label>
            <input type="date" name="check_out" required>
        </div>
        <button type="submit" class="mt-4 btn btn-primary">Reservar</button>
    </form>
</x-app-layout>
