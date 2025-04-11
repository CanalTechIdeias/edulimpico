<x-layout>
    <div class="w3-container">
        <h1>Editar Ranking</h1>

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

        <form action="{{ route('rankings.update', ['id' => $ranking->id]) }}" method="POST" class="w3-container w3-card-4">
            @csrf
            @method('PUT')

            <div class="w3-margin">
                <label for="user_id">Usuário:</label>
                <select name="user_id" id="user_id" class="w3-select w3-border" required>
                    <option value="">Selecione um usuário</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $ranking->user_id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="w3-margin">
                <label for="name">Nome do Ranking:</label>
                <input type="text" name="name" id="name" class="w3-input w3-border" value="{{ $ranking->name }}" required>
            </div>

            <div class="w3-margin">
                <label for="points">Pontos:</label>
                <input type="number" name="points" id="points" class="w3-input w3-border" value="{{ $ranking->points }}" min="0" required>
            </div>

            <div class="w3-margin">
                <button type="submit" class="w3-button w3-blue">Atualizar Ranking</button>
                <a href="{{ route('rankings.index') }}" class="w3-button w3-gray">Cancelar</a>
            </div>
        </form>
    </div>
</x-layout> 