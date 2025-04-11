<x-layout>
    <div class="w3-container">
        <h1>Editar Questão</h1>

        @if($errors->any())
            <div class="w3-panel w3-red w3-display-container">
                <span onclick="this.parentElement.style.display='none'" class="w3-button w3-display-topright">&times;</span>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('questions.update', ['id' => $question->id]) }}" method="POST" class="w3-container w3-card-4">
            @csrf
            @method('PUT')

            <div class="w3-margin">
                <label for="room_id">Sala:</label>
                <select name="room_id" id="room_id" class="w3-select w3-border" required>
                    <option value="">Selecione uma sala</option>
                    @foreach($rooms as $room)
                        <option value="{{ $room->id }}" {{ $room->id == $question->room_id ? 'selected' : '' }}>
                            {{ $room->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="w3-margin">
                <label for="question">Questão:</label>
                <textarea name="question" id="question" class="w3-input w3-border" required>{{ $question->question }}</textarea>
            </div>

            <div class="w3-margin">
                <label for="option_a">Opção A:</label>
                <input type="text" name="option_a" id="option_a" class="w3-input w3-border" value="{{ $question->option_a }}" required>
            </div>

            <div class="w3-margin">
                <label for="option_b">Opção B:</label>
                <input type="text" name="option_b" id="option_b" class="w3-input w3-border" value="{{ $question->option_b }}" required>
            </div>

            <div class="w3-margin">
                <label for="option_c">Opção C:</label>
                <input type="text" name="option_c" id="option_c" class="w3-input w3-border" value="{{ $question->option_c }}" required>
            </div>

            <div class="w3-margin">
                <label for="option_d">Opção D:</label>
                <input type="text" name="option_d" id="option_d" class="w3-input w3-border" value="{{ $question->option_d }}" required>
            </div>

            <div class="w3-margin">
                <label for="answer">Resposta Correta:</label>
                <select name="answer" id="answer" class="w3-select w3-border" required>
                    <option value="">Selecione a resposta correta</option>
                    <option value="a" {{ $question->answer == 'a' ? 'selected' : '' }}>A</option>
                    <option value="b" {{ $question->answer == 'b' ? 'selected' : '' }}>B</option>
                    <option value="c" {{ $question->answer == 'c' ? 'selected' : '' }}>C</option>
                    <option value="d" {{ $question->answer == 'd' ? 'selected' : '' }}>D</option>
                </select>
            </div>

            <div class="w3-margin">
                <label for="points">Pontos:</label>
                <input type="number" name="points" id="points" class="w3-input w3-border" value="{{ $question->points }}" min="1" required>
            </div>

            <div class="w3-margin">
                <button type="submit" class="w3-button w3-blue">Atualizar Questão</button>
                <a href="{{ route('questions.index') }}" class="w3-button w3-gray">Cancelar</a>
            </div>
        </form>
    </div>
</x-layout> 