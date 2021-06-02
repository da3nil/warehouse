@extends('layouts.app', ['title' => __('Список товаров')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Изменить товар'),
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
                                <form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="post">
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

                        <form role="form" action="{{ route('products.update', ['product' => $product->id]) }}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group mb-3">
                                <label for="example-text-input" class="form-control-label">Название</label>
                                <div class="input-group input-group-merge input-group-alternative">
                                    <input type="text" class="form-control" step="1" value="{{ $product->name }}" name="name">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="example-text-input" class="form-control-label">Категория</label>
                                <div class="input-group input-group-merge input-group-alternative">
                                    <select v-on:change="setTypeProduct" class="form-control" name="category_id">
                                        @foreach($product_categories as $category)
                                            <option @if($category->id === $product->category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="example-text-input" class="form-control-label">Цена (руб.)</label>
                                <div class="input-group input-group-merge input-group-alternative">
                                    <input type="number" class="form-control" value="{{ $product->price }}" name="price">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="example-text-input" class="form-control-label">Описание</label>
                                <div class="input-group input-group-merge input-group-alternative">
                                    <textarea class="form-control" name="description">{{ $product->description }}</textarea>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="example-text-input" class="form-control-label">Изображение</label>
                                <div class="input-group input-group-merge input-group-alternative">
                                    <input type="file" class="form-control" name="img">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="example-text-input" class="form-control-label">Количество</label>
                                <div class="input-group input-group-merge input-group-alternative">
                                    <input type="number" class="form-control" step="1" value="{{ $product->qty }}" name="qty">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="example-text-input" class="form-control-label">Местоположение</label>
                                <div class="input-group input-group-merge input-group-alternative">
                                    <select class="form-control" name="location_id">
                                        @foreach($locations as $location)
                                            <option @if($product->location->id === $location->id) selected @endif class="" value="{{ $location->id }}">{{ $location->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="example-text-input" class="form-control-label">Статус</label>
                                <div class="input-group input-group-merge input-group-alternative">
                                    <select class="form-control" name="status_id">
                                        @foreach($statuses as $status)
                                            <option @if($product->status->id === $status->id) selected @endif class="" value="{{ $status->id }}">{{ $status->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">Изменить товар</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
