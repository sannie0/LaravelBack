<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-11</title>
    <style> .is-invalid {color: darkred; }</style>
</head>
<body>
<h2>Добавление товара</h2>
<form method="post" action="{{ url('item') }}">
    @csrf
    <label> Наименование </label>
    <input type="text" name="name" value="{{ old('name') }}"/>
    @error('name')
    <div class="is-invalid">{{ $message }}</div>
    @enderror
    <br><br>
    <label> Категория: </label>
    <select name="category_id" value="{{ old('category_id') }}">
        <option style="..."></option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" @if(old('category_id') == $category->id) selected @endif>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    @error('category_id')
    <div class="is-invalid">{{ $message }}</div>
    @enderror
    <br><br>
    <label> Вес </label>
    <input type="text" name="weight" value="{{ old('weight') }}"/>
    @error('weight')
    <div class="is-invalid">{{ $message }}</div>
    @enderror
    <br><br>
    <label> Цена </label>
    <input type="text" name="price" value="{{ old('price') }}"/>
    @error('price')
    <div class="is-invalid">{{ $message }}</div>
    @enderror
    <br><br>
    <input type="submit">
</form>
</body>
</html>
