@extends('layouts.app', ['title' => __('Список категорий')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Адреса доставки'),
        'description' => __('Это страница точек доставки. Тут вы можете просмотреть все существующие адреса.'),
        'class' => 'col-lg-7'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-8 mb-0">{{ __('Список') }}</h3>
                            <div class="col-4 text-right">
                                <a class="btn btn-sm btn-primary" href="{{ route('locations.create') }}">Добавить адрес</a>
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
                                        <th scope="col" class="sort" data-sort="name">{{ __('Название') }}</th>
                                        <th scope="col" class="sort" data-sort="name">{{ __('Адрес') }}</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody class="list">
                                    @foreach($data as $item)
                                        <tr>
                                            <th scope="row">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                            <span class="name mb-0 text-sm">{{ $item->name }}</span>
                                                    </div>
                                                </div>
                                            </th>

                                            <th scope="row">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <span class="name mb-0 text-sm">{{ $item->address }}</span>
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
                                                        <a class="dropdown-item" href="{{ route('locations.edit', ['location' => $item->id]) }}">Изменить адрес</a>
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
                                {{ $data->links() }}
                            </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
