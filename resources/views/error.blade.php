<div class="container" style="margin-top: 10px">
    @error('email')
    <div class="alert alert-warning" role="alert">
        {{"Email не может быть пустым"}}
    </div>
    @enderror
    @error('password')
    <div class="alert alert-warning" role="alert">
        {{"Password не может быть пустым"}}
    </div>
    @enderror
    @error('error')
    <div class="alert alert-warning" role="alert">
        {{$message}}
    </div>
    @enderror
    @error('success')
    <div class="alert alert-warning" role="alert">
        {{$message}}
    </div>
    @enderror
</div>

