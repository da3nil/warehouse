@extends('layouts.app-user', ['title' => __('Список товаров')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Складской учет спортивного магазина'),
        'description' => __('Это страница товаров. Тут вы можете просмотреть текущий ассортимент товаров и сделать заказ.'),
    ])
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-8 mb-0">{{ __('Список') }}</h3>
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
                                <span class="alert-text"><strong>{{ $errors->first() }}</strong></span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div>
                            <form action="{{ route('users.products.index') }}" method="GET">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text border-primary bg-primary text-white" type="button" id="button-addon1">Категория</span>
                                        <select name="category" class="input-group-text outline-none border-primary text-primary" style="border-right: 1px solid #5e72e4 !important;" name="" id="">
                                            <option value="">Все категории</option>
                                            @foreach($categories as $category)
                                                <option @if((int)Request::get('category') === $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <input style="padding: 10px 12px; border: 1px solid #5e72e4 !important; border-left: 1px solid #5e72e4 !important;"
                                           type="text" name="search" class="form-control" placeholder="Введите название товара или оставьте поле пустым"
                                           aria-label="Example text with button addon" aria-describedby="button-addon1" value="{{ Request::get('search') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary">Найти</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="row my-products">
                            @foreach($products as $product)
                                <div class="col-lg-3 col-md-4 col-sm-6 col pb-4">
                                    <div class="card">
                                        <img alt="Картинка" src="{{ asset($product->img) }}" class="card-img-top p-3">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $product->name }}</h5>
                                            <div style="height: 60px"
                                                 class="d-flex justify-content-between align-items-center flex-wrap">
                                                <h3 class="pr-2">{{ $product->price }} руб.</h3>
                                                <h5>На складе: {{ $product->qty }} шт.</h5>
                                            </div>
                                            <div class="text-center">
                                                <a class="btn btn-primary" href="{{ route('users.products.show', $product->id) }}">Открыть</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-5 d-flex justify-content-center">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
