@extends('layout')
@section('content')
    <div class="container mt-5">
        <h2 class="text-center">Список товаров</h2>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>id</th>
                <th>Наименование</th>
                <th>Вес</th>
                <th>Цена</th>
                <th>Категория</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->weight }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>
                        <a href="{{ url('item/destroy/'.$item->id) }}">Удалить</a>
                        <a href="{{ url('item/edit/'.$item->id) }}">Редактировать</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $items->links() }}
    </div>
@endsection
