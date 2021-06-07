@extends('layouts.app-user', ['title' => __('Список товаров')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Складской учет спортивного магазина'),
        'description' => __('Это страница товара. Тут вы можете просмотреть описание товара и заказать его.'),
    ])
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-8 mb-0">{{ __('Просмотр товара') }}</h3>
                            <div class="col-4 text-right">
{{--                                <button class="btn btn-sm btn-primary" data-toggle="modal"--}}
{{--                                        data-target="#productModal">Добавить товар--}}
{{--                                </button>--}}
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
                                <span class="alert-text"><strong>{!! $errors->first() !!}</strong></span>
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
                                <div class="row">
                                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                                        <img class="img-fluid" src="{{ asset($product->img) }}" alt="">
                                    </div>
                                    <div class="col-md-8">
                                        <h2>{{ $product->name }}</h2>
                                        <div>
                                            <span class="h4">Количество:</span>
                                            {{ $product->qty }}
                                        </div>
                                        <div>
                                            <span class="h4">Категория:</span>
                                            {{ $product->category->name }}
                                        </div>
                                        <div>
                                            <span class="h4">Стоимость: </span>
                                            {{ $product->price }} руб.
                                        </div>
                                        <div class="mb-3">
                                            <span class="h4">Адрес: </span>
                                            {{ $product->location->address }}
                                        </div>
                                        <div class="description mb-5">{{ $product->description }}</div>
                                        <div>
                                            <form method="GET" action="{{ route('cart.add', $product->id) }}">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <button type="submit" class="btn btn-primary">Добавить в заказ</button>
                                                    </div>
                                                    <input style="padding: 10px 12px; width: 75px; max-width: 75px"
                                                           name="qty"
                                                           class="form-control" type="number" min="1" max="{{ $product->qty }}"
                                                           value="1">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
