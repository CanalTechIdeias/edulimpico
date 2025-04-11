<x-layout>
    <div class="w3-container">
        <h1 class="w3-text-blue">Rooms</h1>
        
        @if(session('success'))
            <div class="w3-panel w3-green w3-display-container">
                <span onclick="this.parentElement.style.display='none'"
                    class="w3-button w3-green w3-large w3-display-topright">&times;</span>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if(session('error'))
            <div class="w3-panel w3-red w3-display-container">
                <span onclick="this.parentElement.style.display='none'"
                    class="w3-button w3-red w3-large w3-display-topright">&times;</span>
                <p>{{ session('error') }}</p>
            </div>
        @endif

        <div class="w3-row-padding">
            @foreach($rooms as $room)
                <div class="w3-col m4 w3-margin-bottom">
                    <div class="w3-card w3-hover-shadow">
                        <div class="w3-container w3-blue">
                            <h3>{{ $room->name }}</h3>
                        </div>
                        <div class="w3-container">
                            <p><strong>Topic:</strong> {{ $room->topic }}</p>
                            <p><strong>Admin:</strong> {{ $room->adm_name }}</p>
                            
                            <div class="w3-bar w3-margin-bottom">
                                <a href="{{ route('rooms.show', $room->id) }}" 
                                   class="w3-button w3-blue w3-hover-dark-blue">
                                    <i class="fa fa-eye"></i> View
                                </a>
                                <a href="{{ route('rooms.edit', $room->id) }}" 
                                   class="w3-button w3-green w3-hover-dark-green">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" 
                                      class="w3-bar-item" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w3-button w3-red w3-hover-dark-red"
                                            onclick="return confirm('Are you sure you want to delete this room?')">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="w3-margin-top">
            <a href="{{ route('rooms.create') }}" class="w3-button w3-blue w3-hover-dark-blue">
                <i class="fa fa-plus"></i> Create New Room
            </a>
        </div>
    </div>
</x-layout>