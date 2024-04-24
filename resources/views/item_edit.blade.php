@extends('layout')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <h2 class="text-center">Редактирование товара</h2>
                <form method="post" action="{{ url('item/update/'.$item->id) }}" class="needs-validation" novalidate> <!-- отключение браузерной валидации -->
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Наименование</label>
                        <input type="text" name="name" class="form-control form-control-sm" value="{{ old('name', $item->name) }}">
                        <div id="nameHelp" class="form-text">Введите наименование товара (макс. 150 символов)</div>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label">Категория</label>
                        <select name="category_id" class="form-select form-control-sm">
                            <option value="">Выберите категорию...</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ ($item->category_id == $category->id) ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="weight" class="form-label">Вес</label>
                        <input type="text" name="weight" class="form-control form-control-sm" value="{{ old('weight', $item->weight) }}">
                        <div id="weightHelp" class="form-text">Введите вес товара в граммах </div>
                        @error('weight')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Цена</label>
                        <input type="text" name="price" class="form-control form-control-sm" value="{{ old('price', $item->price) }}">
                        <div id="priceHelp" class="form-text">Введите цену товара в рублях</div>
                        @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" style="background-color: #483D8B; color: white; border: none; border-radius: 4px; cursor: pointer;">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
