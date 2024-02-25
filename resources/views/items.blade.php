<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-11</title>
</head>
<body>
<h2>Список товаров</h2>
<table border="1">
    <thead>
    <td>id</td>
    <td>Наименование</td>
    <td>Вес</td>
    <td>Цена</td>
    <td>Категория</td>
    </thead>
    @foreach($items as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->weight}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->category->name}}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
