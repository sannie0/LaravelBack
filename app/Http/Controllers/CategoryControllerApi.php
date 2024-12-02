<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category_Product;


class CategoryControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json([Category_Product::limit($request->perpage ?? 5) //добавление обработки страниц
        ->offset(($request->perpage ?? 5) * ($request->page ?? 0))
        ->get()]);
        //return response(Category_Product::all());
    }

    public function total()//получение общего количества записей БД
    {
        return response()->json([Category_Product::all()->count()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Gate::allows('create-category')) {// Проверка прав на добавление категории
            return response()->json([
                'code' => 1,
                'message' => 'У вас нет прав на добавление категории',
            ]);
        }
        $validated = $request->validate([// Валидация входных данных
            'name'  => 'required|unique:categories|max:255',
            'image' => 'required|file',
        ]);

        // Обработка загружаемого файла
        try {
            $file = $request->file('image');
            $fileName = rand(1, 100000) . '_' . $file->getClientOriginalName();

            // Загрузка файла в хранилище S3
            $path = Storage::disk('s3')->putFileAs('category_pictures', $file, $fileName);

            // Получение URL загруженного файла
            $fileUrl = Storage::disk('s3')->url($path);
        } catch (Exception $e) {
            return response()->json([
                'code' => 2,
                'message' => 'Ошибка загрузки файла в хранилище S3',
            ]);
        }

        // Создание новой категории
        $category = new Category_Product($validated);
        $category->picture_url = $fileUrl;
        $category->save();

        return response()->json([
            'code' => 0,
            'message' => 'Категория успешно добавлена',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response(Category_Product::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
