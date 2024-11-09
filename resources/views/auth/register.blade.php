@extends('loyauts.app')

@section('content')
    <section class="auth">
        <div class="container">
            <h1>Hello, 👋</h1>

            <div class="auth-block">
                <h2>Register</h2>
                <form action={{route('register')}} method="post">
                    @csrf
                    <div class="">
                        <input name="name" type="text" placeholder="enter name" value={{old('name')}}>
                        @error('name')
                            <div class="">{{session('name')}}</div>
                        @enderror
                    </div>
                    <div class="">
                        <input name="email" type="email" placeholder="enter email" value={{old('email')}}>
                        @error('email')
                        <div class="">{{session('name')}}</div>
                    @enderror
                    </div>

                    <div class="">
                        <input name="password" type="password" placeholder="enter password" value={{old('password')}}>
                        @error('password')
                             <div class="">{{session('name')}}</div>
                        @enderror
                    </div>

                    <span class="">
                        <a href={{route('loginPage')}}>login</a>
                    </span>


                    

                    <button class="btn" type="submit">submit</button>
                </form>
            </div>
        </div>
    </section>
@endsection