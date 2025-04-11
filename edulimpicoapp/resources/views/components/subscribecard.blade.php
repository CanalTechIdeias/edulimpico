<div class="w3-card-4 w3-margin">
    <header class="w3-container w3-blue">
        <h3>{{ $userName }} - {{ $roomName }}</h3>
    </header>

    <div class="w3-container">
        <p><strong>Pontos:</strong> {{ $points }}</p>
        
        <div class="w3-margin-top">
            <a href="{{ route('subscriptions.show', ['id' => $id]) }}" class="w3-button w3-blue">Ver Detalhes</a>
            <a href="{{ route('subscriptions.edit', ['id' => $id]) }}" class="w3-button w3-green">Editar</a>
            <form action="{{ route('subscriptions.destroy', ['id' => $id]) }}" method="POST" class="w3-display-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="w3-button w3-red" onclick="return confirm('Tem certeza que deseja excluir esta inscrição?')">Excluir</button>
            </form>
        </div>
    </div>
</div> 