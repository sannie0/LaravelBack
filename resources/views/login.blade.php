<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-11</title>
    <style> .is-invalid {color: darkred; }</style>
</head>
<body>

@if($user)
    <h2>Здравствуйте, {{ $user -> name }}</h2>
    <a href="{{url('logout')}}">Выйти из аккаунта</a>
@else
    <h2>Вход</h2>
    <form method="POST" action="{{ route('auth') }}">
        @csrf

        <label for="email">Email:</label>
        <input type="email" name="email" required value="{{ old('email') }}">

        @error('email')
        <div class="is-invalid">{{ $message }}</div>
        @enderror
        <br><br>
        <label for="password">Пароль:</label>
        <input type="password" name="password" required>

        @error('password')
        <div class="is-invalid">{{ $message }}</div>
        @enderror
        <br><br>
        <button type="submit">Войти</button>
    </form>
    @error('error')
    <div class="is-invalid">{{$message}}</div>
    @enderror
@endif
</body>
</html>
