<x-app-layout>
    <x-slot name="header">Todas las Reservas</x-slot>

    @foreach($reservations as $res)
        <div class="bg-white p-4 mb-4 rounded shadow">
            <p><strong>Usuario:</strong> {{ $res->user->name }} | <strong>Correo:</strong> {{ $res->user->email }}</p>
            <p><strong>Habitación:</strong> {{ $res->room->name }}</p>
            <p>Ingreso: {{ $res->check_in }} - Salida: {{ $res->check_out }}</p>
        </div>
    @endforeach
</x-app-layout>
