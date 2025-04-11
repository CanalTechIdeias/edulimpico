<x-layout>
    <div class="w3-container">
        <h1>Detalhes da Inscrição</h1>

        <div class="w3-card-4">
            <header class="w3-container w3-blue">
                <h2>{{ $subscription->user_name }} - {{ $subscription->room_name }}</h2>
            </header>

            <div class="w3-container">
                <p><strong>Usuário:</strong> {{ $subscription->user_name }}</p>
                <p><strong>Sala:</strong> {{ $subscription->room_name }}</p>
                <p><strong>Pontos:</strong> {{ $subscription->points }}</p>

                <div class="w3-margin-top">
                    <a href="{{ route('subscriptions.edit', ['id' => $subscription->id]) }}" class="w3-button w3-green">Editar</a>
                    <a href="{{ route('subscriptions.index') }}" class="w3-button w3-gray">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</x-layout> 