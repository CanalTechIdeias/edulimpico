<x-layout>
    @foreach ($rooms as $room)

        <x-roomcard>
            <header class="w3-container w3-blue">
                <h1>{{ $room->name }}</h1>
            </header>

            <div class="w3-container">
                <p>{{ $room->topic }}</p>
                <a href="{{ route('rooms.show', ['id' => $room->id]) }}">Acessar</a>
            </div>
        </x-roomcard>
        
    @endforeach
</x-layout>