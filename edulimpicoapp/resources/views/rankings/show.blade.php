<x-layout>
    <div class="w3-container">
        <h1>Detalhes do Ranking</h1>

        <div class="w3-card-4">
            <header class="w3-container w3-blue">
                <h2>{{ $ranking->name }}</h2>
            </header>

            <div class="w3-container">
                <p><strong>Usuário:</strong> {{ $ranking->user_name }}</p>
                <p><strong>Pontos:</strong> {{ $ranking->points }}</p>

                <div class="w3-margin-top">
                    <a href="{{ route('rankings.edit', ['id' => $ranking->id]) }}" class="w3-button w3-green">Editar</a>
                    <a href="{{ route('rankings.index') }}" class="w3-button w3-gray">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</x-layout> 