<x-app-layout>
    <x-slot name="header">{{ $room->name }}</x-slot>

    <div class="bg-white p-6 rounded shadow">
        <img src="{{ asset('storage/' . $room->image) }}" width="400" class="mb-4">
        <p class="text-gray-700">{{ $room->description }}</p>
        <p class="font-bold mt-2">Precio: S/ {{ $room->price }}</p>
        <p class="mt-1">Capacidad: {{ $room->capacity }} personas</p>
        <p class="mt-1">Disponible: {{ $room->available ? 'Sí' : 'No' }}</p>

        <a href="{{ route('reservations.create', $room) }}" class="btn btn-success mt-4 inline-block">
            Reservar esta habitación
        </a>
    </div>

    {{-- 🔸 Mostrar comentarios --}}
    <h2 class="text-lg font-semibold mt-6">Comentarios de clientes</h2>

    @foreach($room->reviews as $review)
        <div class="bg-gray-100 p-3 rounded my-2">
            <strong>{{ $review->user->name }}</strong>
            <span>⭐ {{ $review->rating }}/5</span>
            <p>{{ $review->comment }}</p>
        </div>
    @endforeach

    {{-- 🔸 Formulario para dejar comentario --}}
    @if(auth()->check())
        <form method="POST" action="{{ route('reviews.store', $room) }}" class="mt-4">
            @csrf
            <label for="rating">Calificación (1 a 5 estrellas)</label>
            <select name="rating" required class="block mb-2">
                @for($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }} ⭐</option>
                @endfor
            </select>

            <textarea name="comment" placeholder="Escribe tu comentario" required class="block mb-2 w-full"></textarea>
            <button class="btn btn-primary">Enviar comentario</button>
        </form>
    @endif
</x-app-layout>
