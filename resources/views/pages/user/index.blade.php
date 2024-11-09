@extends('auth.login')

@section('content')
    <section class="hero">
        <div class="container">
            @session('success')
              <div class="">
                    {{session('success')}} 
               </div>   
            @endsession
            <div class="hero-content">
                <div class="hero-content-left">
                    hero-content-right
                </div>

                <div class="hero-content-right">
                    <form action={{route('join-group')}} method="POST">
                        @csrf
                        <div class="hero-form-group">
                            <input class="hero-input" name="code" type="text" placeholder="enter code group">

                            @error('code')
                                <div class="">
                                    {{session('error')}}
                                </div>
                            @enderror

                            <button type="submit" class="btn">submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="list-groups">
        <div class="dec-sirc"></div>
        <div class="container">
            <h1>list public groups</h1>
        </div>
    </section>
@endsection
