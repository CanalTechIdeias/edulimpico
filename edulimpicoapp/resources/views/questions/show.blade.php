<x-layout>
    <div class="w3-container">
        <h1>Detalhes da Questão</h1>

        <div class="w3-card-4">
            <header class="w3-container w3-blue">
                <h2>{{ $question->question }}</h2>
            </header>

            <div class="w3-container">
                <p><strong>Sala:</strong> {{ $question->room_name }}</p>
                <p><strong>A)</strong> {{ $question->option_a }}</p>
                <p><strong>B)</strong> {{ $question->option_b }}</p>
                <p><strong>C)</strong> {{ $question->option_c }}</p>
                <p><strong>D)</strong> {{ $question->option_d }}</p>
                <p><strong>Resposta Correta:</strong> {{ strtoupper($question->answer) }}</p>
                <p><strong>Pontos:</strong> {{ $question->points }}</p>

                <div class="w3-margin-top">
                    <a href="{{ route('questions.edit', ['id' => $question->id]) }}" class="w3-button w3-green">Editar</a>
                    <a href="{{ route('questions.index') }}" class="w3-button w3-gray">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</x-layout> 