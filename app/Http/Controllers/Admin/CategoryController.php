<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Forum\Category;

class CategoryController extends Controller
{
    /**
     * Переменная для объекта модели Category
     *
     */
    protected $category;

    /**
     * Грузим нужные переменные
     *
     */
    public function __construct()
    {
        $this->category = new Category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $categories)
    {
        $categories = $categories->all();

        return view
        (
            'admin.categories.index',
            ['categories' => $categories]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view
        (
            'admin.categories.create'
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->category->name = $request->name;
        $this->category->save();
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource. Показать конкретный "ресурс"
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.categories.edit', ['id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = $this->category->find($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * Очень важное примечание!!
     * Если URI определен как something/{category},
     * то и параметр который запрос ожидает должен быть $category
     * и передаваться из view должен category ``['category' => $item->id]``
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category_model, $category)
    {
        //dd($category);
        $category_model::destroy($category);
        return redirect()->route('category.index');
    }
}
