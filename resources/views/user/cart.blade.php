@extends('layouts.app-user', ['title' => __('Список товаров')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Складской учет спортивного магазина'),
        'description' => __('Это страница текущего заказа'),
    ])

    <div class="modal fade w-100" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
         style="position: fixed">
        <div class="modal-dialog">
            <div class="modal-content w-100 p-0">
                <div class="modal-header w-100">
                    <h5 class="modal-title" id="exampleModalLabel">Отправить заявку</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('cart.checkout') }}" method="POST">
                    @csrf
                    <div class="modal-body w-100">
                        <div class="form-group w-100 p-0 mb-3">
                            <label for="or1">Имя</label>
                            <input name="name" id="or1" type="text" class="form-control m-0 w-100"
                                   style="color: #000000" value="">
                        </div>
                        <div class="form-group w-100 p-0 mb-3">
                            <label for="or2">Email</label>
                            <input name="email" id="or2" type="email" class="form-control m-0 w-100"
                                   style="color: #000000" value="">
                        </div>
                        <div class="form-group w-100 p-0 mb-3">
                            <label for="or3">Адрес</label>
                            <input name="address" id="or3" type="text" class="form-control m-0 w-100"
                                   style="color: #000000">
                        </div>
                        <div class="form-group w-100 p-0 mb-3">
                            <label for="or4">Телефон</label>
                            <input name="phone" id="or4" type="tel" class="form-control m-0 w-100"
                                   style="color: #000000">
                        </div>
                    </div>
                    <div class="modal-footer w-100">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Оформить заказ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-8 mb-0">{{ __('Заказ') }}</h3>
                            <div class="col-4 text-right">
                                <button class="btn btn-primary btn-icon" data-toggle="modal"
                                        data-target="#exampleModal">
                                    <span class="btn-inner--icon"><i class="fas fa-check mr-2"></i></span>
                                    <span class="nav-link-inner--text">Отправить заявку</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                <span class="alert-text"><strong>{{ session('success') }}</strong></span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                <span class="alert-text"><strong>{{ $errors->first() }}</strong></span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div>
                            <form action="">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text border-primary bg-primary text-white"
                                              type="button" id="button-addon1">Категория</span>
                                        <select class="input-group-text outline-none border-primary text-primary"
                                                style="border-right: 1px solid #5e72e4 !important;" name="" id="">
                                            <option value="">Все категории</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <input
                                        style="padding: 10px 12px; border: 1px solid #5e72e4 !important; border-left: 1px solid #5e72e4 !important;"
                                        type="text" class="form-control"
                                        placeholder="Введите название товара или оставьте поле пустым"
                                        aria-label="Example text with button addon" aria-describedby="button-addon1">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary">Найти</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                @if (count(Cart::content()))
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="border-top-0" scope="col">Картинка</th>
                                            <th class="border-top-0" scope="col">Товар</th>
                                            <th class="border-top-0" scope="col">Количество</th>
                                            <th class="border-top-0" scope="col">Цена</th>
                                            <th style="max-width: 10%; width: 10%" class="border-top-0"
                                                scope="col"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach (Cart::content() as $item)
                                            <tr>
                                                <td style="text-align: center; max-width: 110px; width: 140px">
                                                    <a href="{{ route('users.products.show', $item->id) }}">
                                                        <img
                                                            src="{{ asset($item->model->img) }}" class="img-fluid" alt="">
                                                    </a>
                                                </td>
                                                <td><a href="{{ route('users.products.show', $item->id) }}">{{ $item->name }}</a></td>
                                                <td>{{ $item->qty }}</td>
                                                <td>{{ $item->price }} руб.</td>
                                                <td style="max-width: 10%; width: 10%">
                                                    <form method="post"
                                                          action="{{ route('cart.del', ['rowId' => $item->rowId]) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">
                                                            Удалить
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <th class="" scope="col"></th>
                                            <th class="" scope="col"></th>
                                            <th class="" scope="col"></th>
                                            <th class="" scope="col">Итого <br> {{ Cart::priceTotal() }} руб.</th>
                                            <th style="max-width: 10%; width: 10%" class="" scope="col"></th>
                                        </tr>
                                        </tbody>
                                    </table>
                                @else
                                    <div class="alert border-primary text-center m-0 w-100"
                                         style="font-size: 1rem; padding: 1rem" role="alert">
                                        В вашем заказе нет товаров.
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
