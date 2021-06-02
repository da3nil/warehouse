<?php

namespace App\Http\Controllers;

use App\Filters\ProductFilter;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Location;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductType;
use App\Models\Status;
use Illuminate\Http\Request;
use PhpParser\Builder;

class ProductController extends Controller
{
    /**
     * Показать страницу всех текущих товаров
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index(ProductFilter $filters)
    {
        $products = Product::with(['type', 'status', 'location'])
            ->filter($filters)->paginate(8);

        $statuses = Status::all();

        $locations = Location::all();

        $product_categories = ProductCategory::all();

        $product_types = ProductType::all();

        $data = compact(['products', 'statuses', 'locations', 'product_types', 'product_categories']);

        return view('products.current.index', $data);
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
     * Сохранить товар в хранилище
     *
     * @param  \App\Http\Requests\ProductStoreRequest  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        $data = $request->all();

        $model = Product::create($data);

        if (!$model->exists()) {
            return back()->withErrors(['msg' => 'Ошибка создания товара']);
        }

        return back()->with(['success' => 'Товар успешно создан']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with(['type', 'location', 'status'])->findOrFail($id);

        $statuses = Status::all();

        $locations = Location::all();

        $product_categories = ProductCategory::all();

        $product_types = ProductType::all();

        $data = compact(['product', 'statuses', 'locations', 'product_types', 'product_categories']);

        return view('products.current.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $product = Product::with(['type', 'location', 'status'])->findOrFail($id);

        $statuses = Status::all();

        $locations = Location::all();

        $product_categories = ProductCategory::all();

        $product_types = ProductType::all();

        $data = compact(['product', 'statuses', 'locations', 'product_types', 'product_categories']);

        return view('products.current.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->all();

        //dd($product);

        $product->update($data);

        //dd($product);

        if (!$product->update($data)) {
            return back()->withErrors(['msg' => 'Ошибка обновления товара']);
        }

        return back()->with(['success' => 'Товар успешно обновлен']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $result = $product->delete();

        if (!$result) {
            return back()->withErrors(['msg' => 'Ошибка удаления товара']);
        }

        return redirect()
            ->route('products.index')
            ->with(['success' => 'Товар успешно удален']);
    }
}
