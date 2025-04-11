<x-layout>
    <div class="w3-container">
        <h1>Inscrições</h1>
        <a href="{{ route('subscriptions.create') }}" class="w3-button w3-green">Criar Nova Inscrição</a>
        
        @if(session('success'))
            <div class="w3-panel w3-green w3-display-container">
                <span onclick="this.parentElement.style.display='none'" class="w3-button w3-display-topright">&times;</span>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if(session('error'))
            <div class="w3-panel w3-red w3-display-container">
                <span onclick="this.parentElement.style.display='none'" class="w3-button w3-display-topright">&times;</span>
                <p>{{ session('error') }}</p>
            </div>
        @endif

        <div class="w3-row-padding w3-margin-top">
            @foreach($subscriptions as $subscription)
                <x-subscribecard
                    :id="$subscription->id"
                    :userName="$subscription->user_name"
                    :roomName="$subscription->room_name"
                    :points="$subscription->points"
                />
            @endforeach
        </div>
    </div>
</x-layout> 