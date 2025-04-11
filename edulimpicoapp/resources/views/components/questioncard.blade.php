<div class="w3-card-4 w3-margin">
    <header class="w3-container w3-blue">
        <h3>{{ $question }}</h3>
    </header>

    <div class="w3-container">
        <p><strong>A)</strong> {{ $optionA }}</p>
        <p><strong>B)</strong> {{ $optionB }}</p>
        <p><strong>C)</strong> {{ $optionC }}</p>
        <p><strong>D)</strong> {{ $optionD }}</p>
        <p><strong>Resposta:</strong> {{ strtoupper($answer) }}</p>
        <p><strong>Pontos:</strong> {{ $points }}</p>
        <p><strong>Sala:</strong> {{ $roomName }}</p>
        
        <div class="w3-margin-top">
            <a href="{{ route('questions.show', ['id' => $id]) }}" class="w3-button w3-blue">Ver Detalhes</a>
            <a href="{{ route('questions.edit', ['id' => $id]) }}" class="w3-button w3-green">Editar</a>
            <form action="{{ route('questions.destroy', ['id' => $id]) }}" method="POST" class="w3-display-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="w3-button w3-red" onclick="return confirm('Tem certeza que deseja excluir esta questão?')">Excluir</button>
            </form>
        </div>
    </div>
</div> 