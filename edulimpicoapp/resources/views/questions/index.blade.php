<x-layout>
    <div class="w3-container">
        <h1>Questões</h1>
        <a href="{{ route('questions.create') }}" class="w3-button w3-green">Criar Nova Questão</a>
        
        @if(session('success'))
            <div class="w3-panel w3-green w3-display-container">
                <span onclick="this.parentElement.style.display='none'" class="w3-button w3-display-topright">&times;</span>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="w3-row-padding w3-margin-top">
            @foreach($questions as $question)
                <x-questioncard
                    :id="$question->id"
                    :question="$question->question"
                    :optionA="$question->option_a"
                    :optionB="$question->option_b"
                    :optionC="$question->option_c"
                    :optionD="$question->option_d"
                    :answer="$question->answer"
                    :points="$question->points"
                    :roomName="$question->room_name"
                />
            @endforeach
        </div>
    </div>
</x-layout> 