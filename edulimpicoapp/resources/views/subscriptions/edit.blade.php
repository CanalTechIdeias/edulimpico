<x-layout>
    <div class="w3-container">
        <h1>Editar Inscrição</h1>

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

        <form action="{{ route('subscriptions.update', ['id' => $subscription->id]) }}" method="POST" class="w3-container w3-card-4">
            @csrf
            @method('PUT')

            <div class="w3-margin">
                <label for="user_id">Usuário:</label>
                <select name="user_id" id="user_id" class="w3-select w3-border" required>
                    <option value="">Selecione um usuário</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $subscription->user_id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="w3-margin">
                <label for="room_id">Sala:</label>
                <select name="room_id" id="room_id" class="w3-select w3-border" required>
                    <option value="">Selecione uma sala</option>
                    @foreach($rooms as $room)
                        <option value="{{ $room->id }}" {{ $room->id == $subscription->room_id ? 'selected' : '' }}>
                            {{ $room->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="w3-margin">
                <label for="points">Pontos:</label>
                <input type="number" name="points" id="points" class="w3-input w3-border" value="{{ $subscription->points }}" min="0" required>
            </div>

            <div class="w3-margin">
                <button type="submit" class="w3-button w3-blue">Atualizar Inscrição</button>
                <a href="{{ route('subscriptions.index') }}" class="w3-button w3-gray">Cancelar</a>
            </div>
        </form>
    </div>
</x-layout> 