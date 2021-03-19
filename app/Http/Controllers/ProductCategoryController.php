<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCategoryStoreRequest;
use App\Http\Requests\ProductCategoryUpdateRequest;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ProductCategory::paginate(15);

        return view('products.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(ProductCategoryStoreRequest $request)
    {
        $data = $request->all();

        $model = ProductCategory::create($data);

        if (!$model->exists()) {
            return back()
                ->withErrors(['msg' => 'Ошибка создания категории']);
        }

        return redirect()
            ->route('categories.index')
            ->with(['success' => 'Категория успешно создана']);
    }

    /**
     * Display the specified resource.
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $category = ProductCategory::findOrFail($id);

        return view('products.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(ProductCategoryUpdateRequest $request, $id)
    {
        $category = ProductCategory::findOrFail($id);

        $data = $request->all();

        if (!$category->update($data)) {
            return back()
                ->withErrors(['msg' => 'Ошибка обновления категории']);
        }

        return redirect()
            ->route('categories.edit', ['category' => $category->id])
            ->with(['success' => 'Категория успешно обновлена']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = ProductCategory::findOrFail($id);

        if (!$category->delete()) {
            return back()
                ->withErrors(['msg' => 'Ошибка удаления категории']);
        }

        return redirect()
            ->route('categories.index')
            ->with(['success' => 'Категория успешно удалена']);
    }
}
