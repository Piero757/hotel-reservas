<x-app-layout>
    <x-slot name="header">Habitaciones</x-slot>

    <a href="{{ route('rooms.create') }}" class="btn btn-primary mb-4">Nueva habitación</a>

    @foreach($rooms as $room)
        <div class="bg-white p-4 shadow mb-4">
            <h2 class="font-bold">{{ $room->name }}</h2>
            <p>{{ $room->description }}</p>
            <p>S/ {{ $room->price }} - Capacidad: {{ $room->capacity }}</p>
            @if($room->image)
                <img src="{{ asset('storage/' . $room->image) }}" width="200">
            @endif
            <div class="mt-2">
                <a href="{{ route('rooms.edit', $room) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('rooms.destroy', $room) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    @endforeach
</x-app-layout>
