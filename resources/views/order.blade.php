<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-11</title>
</head>
<body>
<h2>{{$order ? "Список товаров заказа №: ".$order->id : 'Неверный ID категории'}}</h2>
@if($order)
    <table border="1">
        <tr>
        <td>id</td>
        <td>Наименование</td>
        <td>Цена</td>
        <td>Количество</td>
        <td>Стоимость</td>
        </tr>
        @php $s = 0 @endphp
        @foreach($order->items as $item)
            @php $k = $item->pivot->price * $item->pivot->quantity @endphp
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->pivot->price}}</td>
                <td>{{$item->pivot->quantity}}</td>
                <td>{{$k}}</td>
                @php $s = $s + $k; $k = 0 @endphp

            </tr>
        @endforeach
    </table>
    <h2>{{"ИТОГО: ".$s}}</h2>
@endif
</body>
</html>
