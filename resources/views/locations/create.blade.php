@extends('layouts.app', ['title' => __('Изменить категорию')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Добавить адрес'),
        'description' => __('Это страница точек доставки. Тут вы можете просмотреть и изменить все существующие адреса.'),
        'class' => 'col-lg-7'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-8 mb-0">{{ __('Категория') }}</h3>
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

                        <form role="form" action="{{ route('locations.store') }}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="example-text-input" class="form-control-label">Название</label>
                                <div class="input-group input-group-merge input-group-alternative">
                                    <input type="text" class="form-control" step="1" value="" name="name">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="example-text-input" class="form-control-label">Адрес</label>
                                <div class="input-group input-group-merge input-group-alternative">
                                    <input type="text" class="form-control" step="1" value="" name="address">
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">Создать адрес</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
