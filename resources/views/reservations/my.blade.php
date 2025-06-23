<x-app-layout>
    <x-slot name="header">Mis Reservas</x-slot>

    @foreach($reservations as $res)
        <div class="bg-white p-4 mb-4 rounded shadow">
            <h3>{{ $res->room->name }}</h3>
            <p>Ingreso: {{ $res->check_in }}</p>
            <p>Salida: {{ $res->check_out }}</p>
        </div>
    @endforeach
</x-app-layout>
