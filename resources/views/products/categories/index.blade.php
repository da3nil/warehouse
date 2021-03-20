@extends('layouts.app', ['title' => __('Список категорий')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Список категорий'),
        'description' => __('Это страница категорий. Тут вы можете просмотреть все существующие категории.'),
        'class' => 'col-lg-7'
    ])

    <!-- Modal -->
    <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header bg-transparent">
                            <div class="text-muted text-center mt-2 mb-3">Добавить категорию</div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5">
                            <form role="form" action="{{ route('categories.store') }}" method="post">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="example-text-input" class="form-control-label">Название</label>
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <input type="text" class="form-control" step="1" value="" name="name">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4">Добавить категорию</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-8 mb-0">{{ __('Список') }}</h3>
                            <div class="col-4 text-right">
                                <button class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#categoryModal">Добавить категорию
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

                        <div class="table-responsive">
                            <div>
                                <table class="table align-items-center">
                                    <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="name">{{ __('Категория') }}</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody class="list">
                                    @foreach($categories as $category)
                                        <tr>
                                            <th scope="row">
                                                <div class="media align-items-center">
{{--                                                    <a href="#" class="avatar rounded-circle mr-3">--}}
{{--                                                        <img alt="Image placeholder"--}}
{{--                                                             src="{{ asset($product->type->img) }}">--}}
{{--                                                    </a>--}}
                                                    <div class="media-body">
                                                            <span
                                                                class="name mb-0 text-sm">{{ $category->name }}</span>
                                                    </div>
                                                </div>
                                            </th>

                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#"
                                                       role="button" data-toggle="dropdown"
                                                       aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div
                                                        class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <a class="dropdown-item" href="{{ route('categories.edit', ['category' => $category->id]) }}">Изменить категорию</a>
                                                        <div class="" href="#">
                                                            <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="post">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="outline-none btn-link d-inline p-0 m-0 border-0 text-left w-100">
                                                                    <span class="dropdown-item">Удалить категорию</span>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                            <div class="mt-5 d-flex justify-content-center">
                                {{ $categories->links() }}
                            </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
