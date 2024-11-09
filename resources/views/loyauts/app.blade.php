<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href={{ asset('assets/style.css') }}>
</head>
<body>
    <div class="bg">
     @auth
        <x-navbar />
     @endauth
        @yield('content')
     </div>
</body>
</html>