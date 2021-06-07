@extends('layouts.app', ['title' => __('Список товаров')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Просмотр товара'),
        'description' => __('Это страница товара. Тут вы можете изменить изменить свойства товара или удалить его.'),
        'class' => 'col-lg-7'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-8 mb-0">{{ __('Заявка #' . $order->id) }}</h3>
                            <div class="col-4 text-right">
                                <form class="d-inline" action="{{ route('orders.destroy', $order->id) }}"
                                      method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger" data-toggle="modal">
                                        Удалить заявку
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" id="productModal">
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
                                <div>Имя: <b> {{ $order->name }}</b></div>
                                <div>Телефон: <b> {{ $order->phone }}</b></div>
                                <div>Email: <b> {{ $order->email }}</b></div>
                                <div>Адрес: <b> {{ $order->address }}</b></div>
                                <div>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="border-top-0" scope="col">Картинка</th>
                                            <th class="border-top-0" scope="col">Товар</th>
                                            <th class="border-top-0" scope="col">Цена</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach ($order->orderPositions as $item)
                                            <tr>
                                                <td style="text-align: center; max-width: 110px; width: 140px"><img src="{{ asset($item->product->img) }}" class="img-fluid" alt=""></td>
                                                <td>
                                                    <div class="h5">{{ $item->product->name }}</div>
                                                </td>
                                                <td>{{ $item->product->price }} руб.</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <th class="" scope="col"></th>
                                            <th class="" scope="col"></th>
                                            <th class="" scope="col">Итого <br> {{ $order->total }} руб.</th>
                                            <th style="max-width: 10%; width: 10%" class="" scope="col"></th>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
