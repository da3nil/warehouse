<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartCheckoutRequest;
use App\Models\Order;
use App\Models\OrderPosition;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Str;

use function MongoDB\BSON\toJSON;

class CartController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::all();

        return view('user.cart', compact('categories'));
    }

    public function add(int $id, int $qty = 1): \Illuminate\Http\RedirectResponse
    {
        if (!empty(\request()->input()['qty'])) {
            $qty = \request()->input()['qty'];
        }

        $item = Product::findOrFail($id);

        foreach (Cart::content() as $row) {
            if ((int) $row->id === $id) {
                if ((int) $row->qty + $qty > $item->qty) {
                    return back()
                        ->withErrors(['msg' => 'Нет такого количества товара [' . $item->name . '] на складе.
                        <i>У вас в заказе уже ' . $row->qty . ' шт.</i>']);
                }
            }
        }

        if ($item->qty < $qty) {
            return back()
                ->withErrors(['msg' => 'Нет такого количества товара [' . $item->name . '] на складе']);
        }

        $cartItem = Cart::add($id, $item->name, $qty, $item->price, 0);

        Cart::associate($cartItem->rowId, Product::class);

        return back()
            ->with(['success' => 'Товар успешно добавлен в корзину']);
    }

    public function del($rowId)
    {
        Cart::remove($rowId);

        return back()
            ->with(['success' => 'Товар успешно удален из корзины']);
    }

    public function clear()
    {
        Cart::destroy();

        return back()
            ->with(['success' => 'Корзина очищена']);
    }

    public function checkout(CartCheckoutRequest $request)
    {
        $data = $request->all();

        $identifier = Str::random(30);

        $order = Order::make($data);

        $order->identifier = $identifier;

        $order->save();

        $sum = 0;

        foreach (Cart::content() as $item) {
            $product = Product::findOrFail($item->id);

            $product->qty -= $item->qty;

            for ($i = 0; $i < $item->qty; $i++){
                OrderPosition::make(['order_id' => $order->id, 'product_id' => $item->model->id])->save();
                $sum += $item->model->price;
            }

            $product->save();
        }

        $order->total = $sum;

        $order->save();

        Cart::store($identifier);

        Cart::destroy();

        return back()
            ->with(['success' => 'Ваш заказ принят']);
    }

}
