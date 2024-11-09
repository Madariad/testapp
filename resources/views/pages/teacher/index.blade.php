@extends('auth.login')

@section('content')
<section class="teacher-section">
    @session('success')
        <div id="successMessage" class="">
            {{ session('success') }}
        </div>
    @endsession
    <div class="container">
        <div class="teacher-section-content">
            <div class="teacher-section-create">
                <form action={{route('teacherGroup.store')}} method="POST" class="teacher-section-create-form">
                    @csrf
                    <input type="text" name="name" placeholder="Enter name">

                    <textarea name="description" cols="30" rows="10" placeholder="Enter description"></textarea>

                    <!-- Скрытое поле для хранения кода -->
                    <input readonly  type="text" id="groupCode" name="code">

                    <!-- Кнопка для генерации кода -->
                    <button type="button" class="btn-generate" onclick="generateCode()">Generate Code</button>

                    <!-- Кнопка для отправки формы -->
                    <button type="submit" class="btn-submit">Submit</button>
                </form>
            </div>
            <div class="teacher-section-group">
                <h2>Groups</h2>
                <div class="groups-container">
                    @forelse ($groups as $group)
                        <a href={{ route('teacherGroup.show', $group->id) }}>
                            <div class="group-card">
                                <h3 class="group-name">{{ $group->name }}</h3>
                                <p class="group-description">{{ $group->description }}</p>
                                <p class="group-code">Code: {{ $group->code }}</p>
                                <p class="group-status">
                                    Status: 
                                    <span class="{{ $group->is_active ? 'active' : 'inactive' }}">
                                        {{ $group->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </p>
                            </div>
                        </a>
                    @empty
                        <div class="no-groups">No groups available</div>
                    @endforelse
                </div>
            </div>
            
        </div>
    </div>
</section>

<script>
    // Функция для генерации случайного кода
    function generateCode() {
        let code = '';
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        const codeLength = 10;

        for (let i = 0; i < codeLength; i++) {
            code += characters.charAt(Math.floor(Math.random() * characters.length));
        }

        // Записываем код в скрытое поле
        document.getElementById('groupCode').value = code;
      
    }


    setTimeout(function() {
        const successMessage = document.getElementById('successMessage');
        if (successMessage) {
            successMessage.style.display = 'none';
        }
    }, 5000);
</script>
@endsection
