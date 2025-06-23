<x-app-layout>
    <x-slot name="header">{{ isset($room) ? 'Editar Habitación' : 'Crear Habitación' }}</x-slot>

    <form method="POST" enctype="multipart/form-data" action="{{ isset($room) ? route('rooms.update', $room) : route('rooms.store') }}">
        @csrf
        @if(isset($room)) @method('PUT') @endif

        <input name="name" value="{{ $room->name ?? '' }}" placeholder="Nombre" class="block mb-2">
        <textarea name="description" placeholder="Descripción" class="block mb-2">{{ $room->description ?? '' }}</textarea>
        <input type="number" name="price" value="{{ $room->price ?? '' }}" placeholder="Precio" class="block mb-2">
        <input type="number" name="capacity" value="{{ $room->capacity ?? '' }}" placeholder="Capacidad" class="block mb-2">
        <input type="file" name="image" class="block mb-2">
        <label><input type="checkbox" name="available" {{ isset($room) && $room->available ? 'checked' : '' }}> Disponible</label>

        <button class="btn btn-primary mt-4">{{ isset($room) ? 'Actualizar' : 'Guardar' }}</button>
    </form>
</x-app-layout>
