@extends('loyauts.app')

@section('content')
    <section class="auth" >
        <div class="container">
            <h1>Hello, 👋</h1>


            @if ($errors->any())
                <div class="">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <div class="auth-block">
                <h2>Login</h2>
                <form action={{route('login')}} method="post">
                    @csrf
                    <div class="">
                        <input name="email" type="email" placeholder="enter email" value={{old('email')}}>

                        @error('email')
                            <div class="">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="">
                        <input name="password" type="password" placeholder="enter password" value={{old('password')}}>
                        @error('password')
                        <div class="">{{$message}}</div>
                         @enderror
                    </div>

                    <span class="">
                        <a href={{route('registerPage')}}>register</a>
                    </span>

                    <button class="btn" type="submit">submit</button>
                </form>
            </div>
        </div>
    </section>
@endsection