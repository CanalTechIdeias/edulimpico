<x-layout>
    <div class="w3-container">
        <h1 class="w3-text-blue">Room Details</h1>

        @if(session('success'))
            <div class="w3-panel w3-green w3-display-container">
                <span onclick="this.parentElement.style.display='none'"
                    class="w3-button w3-green w3-large w3-display-topright">&times;</span>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="w3-card-4">
            <div class="w3-container w3-blue">
                <h2>{{ $room->name }}</h2>
            </div>
            
            <div class="w3-container">
                <p><strong>Topic:</strong> {{ $room->topic }}</p>
                <p><strong>Admin:</strong> {{ $room->adm_name }}</p>
                
                <div class="w3-bar w3-margin-top">
                    <a href="{{ route('rooms.edit', $room->id) }}" 
                       class="w3-button w3-green w3-hover-dark-green">
                        <i class="fa fa-edit"></i> Edit Room
                    </a>
                    <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" 
                          class="w3-bar-item" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w3-button w3-red w3-hover-dark-red"
                                onclick="return confirm('Are you sure you want to delete this room?')">
                            <i class="fa fa-trash"></i> Delete Room
                        </button>
                    </form>
                    <a href="{{ route('rooms.index') }}" 
                       class="w3-button w3-grey w3-hover-dark-grey">
                        <i class="fa fa-arrow-left"></i> Back to Rooms
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
