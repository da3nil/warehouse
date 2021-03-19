@extends('layouts.app', ['title' => __('Изменить категорию')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Изменить категорию'),
        'description' => __('Это страница категории. Тут вы можете изменить изменить свойства категории или удалить её.'),
        'class' => 'col-lg-7'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-8 mb-0">{{ __('Категория') }}</h3>
                            <div class="col-4 text-right">
                                <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#productModal"> Удалить категорию
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

                        <form role="form" action="{{ route('categories.update', ['category' => $category->id]) }}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="form-group mb-3">
                                <label for="example-text-input" class="form-control-label">Название</label>
                                <div class="input-group input-group-merge input-group-alternative">
                                    <input type="text" class="form-control" step="1" value="{{ $category->name }}" name="name">
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">Обновить категорию</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
