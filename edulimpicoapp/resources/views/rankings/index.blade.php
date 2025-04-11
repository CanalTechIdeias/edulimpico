<x-layout>
    <div class="w3-container">
        <h1>Rankings</h1>
        <a href="{{ route('rankings.create') }}" class="w3-button w3-green">Criar Novo Ranking</a>
        
        @if(session('success'))
            <div class="w3-panel w3-green w3-display-container">
                <span onclick="this.parentElement.style.display='none'" class="w3-button w3-display-topright">&times;</span>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="w3-row-padding w3-margin-top">
            @foreach($rankings as $ranking)
                <x-rankingcard
                    :id="$ranking->id"
                    :name="$ranking->name"
                    :userName="$ranking->user_name"
                    :points="$ranking->points"
                />
            @endforeach
        </div>
    </div>
</x-layout> 