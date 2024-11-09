@extends('loyauts.app')

@section('content')
  @auth('teachers')
    <section class="module">
        <div class="container">
            <div class="module-form">
                <h2 class="form-title">Create New Module</h2>
                <form action="/modules" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Module Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter module name" required>
                    </div>
                    <button type="submit" class="submit-btn">Create Module</button>
                </form>
            </div>

            @forelse ($modules as $module)
                <div class="module-item">
                    {{ $module }}
                </div>
            @empty
                <p class="no-modules">No module</p>
            @endforelse
        </div>
    </section>

  @endauth
  @auth('web')
    <section class="module">
        <div class="container">
            @forelse ($modules as $module)
                {{$module}}
            @empty
                no module
            @endforelse
        </div>
    </section>
  @endauth
@endsection