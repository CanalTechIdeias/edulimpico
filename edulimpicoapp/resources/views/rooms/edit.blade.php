<x-layout>
    <div class="w3-container">
        <h1 class="w3-text-blue">Edit Room</h1>

        @if ($errors->any())
            <div class="w3-panel w3-red w3-display-container">
                <span onclick="this.parentElement.style.display='none'"
                    class="w3-button w3-red w3-large w3-display-topright">&times;</span>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('rooms.update', $room->id) }}" method="POST" class="w3-container w3-card-4 w3-light-grey">
            @csrf
            @method('PUT')
            
            <div class="w3-margin-bottom">
                <label class="w3-text-blue"><b>Room Name</b></label>
                <input class="w3-input w3-border" type="text" name="name" value="{{ old('name', $room->name) }}" required>
            </div>

            <div class="w3-margin-bottom">
                <label class="w3-text-blue"><b>Topic</b></label>
                <input class="w3-input w3-border" type="text" name="topic" value="{{ old('topic', $room->topic) }}" required>
            </div>

            <div class="w3-bar">
                <button type="submit" class="w3-button w3-blue w3-hover-dark-blue">
                    <i class="fa fa-save"></i> Update Room
                </button>
                <a href="{{ route('rooms.index') }}" class="w3-button w3-grey w3-hover-dark-grey">
                    <i class="fa fa-times"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</x-layout>
