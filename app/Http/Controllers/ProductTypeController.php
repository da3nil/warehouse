<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductTypeStoreRequest;
use App\Http\Requests\ProductTypeUpdateRequest;
use App\Models\ProductCategory;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $types = ProductType::orderBy('category_id')->with(['category'])->paginate(15);

        $product_categories = ProductCategory::all();

        return view('products.types.index', compact('types', 'product_categories'));
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
    public function store(ProductTypeStoreRequest $request)
    {
        $data = $request->all();

        $model = new ProductType();

        $model->fill($data);

        if ($request->hasFile('img')) {
            $image = $request->file('img');

            $path = $image->store('img', 'public');

            $model->img = 'storage/' . $path;
        }

        $model->save();

        if (!$model->exists()) {
            return back()
                ->withErrors(['msg' => 'Ошибка создания типа товара']);
        }

        return redirect()
            ->route('types.index')
            ->with(['success' => 'Тип товара успешно создан']);
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
        $type = ProductType::findOrFail($id);

        $product_categories = ProductCategory::all();

        return view('products.types.edit', compact('type', 'product_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProductTypeUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(ProductTypeUpdateRequest $request, $id)
    {
        $type = ProductType::findOrFail($id);

        $data = $request->all();

        $type->fill($data);

        if ($request->hasFile('img')) {
            $image = $request->file('img');

            $path = $image->store('img', 'public');

            $type->img = 'storage/' . $path;
        }

        if (!$type->save()) {
            return back()
                ->withErrors(['msg' => 'Ошибка обновления типа товара']);
        }

        return redirect()
            ->route('types.index')
            ->with(['success' => 'Тип товара успешно обновлен']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $type = ProductType::findOrFail($id);

        if (!$type->delete()) {
            return back()
                ->withErrors(['msg' => 'Ошибка удаления типа товара']);
        }

        return redirect()
            ->route('types.index')
            ->with(['success' => 'Тип товара успешно удален']);
    }
}
