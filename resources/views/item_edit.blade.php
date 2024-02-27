<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Редактирование товара</title>
    <style> .is-invalid {color: darkred; }</style>
</head>
<body>
<h2>Редактирование товара</h2>
<form method="post" action="{{ url('item/update/'.$item->id) }}">
    @csrf

    <label>Наименование</label>
    <input type="text" name="name" value="{{ old('name', $item->name) }}"/>
    @error('name')
    <div class="is-invalid">{{ $message }}</div>
    @enderror
    <br>

    <label>Категория</label>
    <select name="category_id">
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ ($item->category_id == $category->id) ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    <br>

    <label>Цена</label>
    <input type="text" name="price" value="{{ old('price', $item->price) }}"/>
    @error('price')
    <div class="is-invalid">{{ $message }}</div>
    @enderror
    <br>

    <label>Вес</label>
    <input type="text" name="weight" value="{{ old('weight', $item->weight) }}"/>
    @error('weight')
    <div class="is-invalid">{{ $message }}</div>
    @enderror
    <br>

    <input type="submit" value="Сохранить">
</form>
</body>
</html>
