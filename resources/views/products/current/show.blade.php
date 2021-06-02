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
                            <h3 class="col-8 mb-0">{{ __('Товар') }}</h3>
                            <div class="col-4 text-right">
                                <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="btn btn-sm btn-primary">Изменить товар</a>
                                <form class="d-inline" action="{{ route('products.destroy', ['product' => $product->id]) }}"
                                      method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#productModal"> Удалить товар
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

                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <img class="img-fluid" src="{{ asset($product->type->img) }}" alt="">
                                </div>
                                <div class="col-md-8">
                                    <h2>{{ $product->type->name }}</h2>
                                    <div>
                                        <span class="h4">Статус:</span>
                                        <span class="badge badge-dot ml-2 mr-4">
                                            <i class="bg-{{ $product->status->value }}"></i>
                                            <span class="status">{{ $product->status->name }}</span>
                                        </span>
                                    </div>
                                    <div>
                                        <span class="h4">Количество:</span>
                                        {{ $product->qty }}
                                    </div>
                                    <div>
                                        <span class="h4">Категория:</span>
                                        {{ $product->type->category->name }}
                                    </div>
                                    <div>
                                        <span class="h4">Стоимость: </span>
                                        {{ $product->type->price }} руб.
                                    </div>
                                    <div class="">
                                        <span class="h4">Прототип товара: </span>
                                        <a href="{{ route('types.edit', ['type' => $product->type->id]) }}">Изменить</a>
                                    </div>
                                    <div class="">
                                        <span class="h4">Точка назначения: </span>
                                        {{ $product->location->name }}
                                    </div>
                                    <div class="mb-3">
                                        <span class="h4">Адрес доставки: </span>
                                        {{ $product->location->address }}
                                    </div>
                                    <div class="description">{{ $product->type->description }}</div>
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
