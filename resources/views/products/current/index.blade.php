@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
        @include('users.partials.header', [
            'title' => __('Список товаров'),
            'description' => __('This is your profile page. You can see the progress you\'ve made with your work and manage your projects or assigned tasks'),
            'class' => 'col-lg-7'
        ])


        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <h3 class="col-12 mb-0">{{ __('Список') }}</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div>
                                    <table class="table align-items-center">
                                        <thead class="thead-light">
                                        <tr>
                                            <th scope="col" class="sort" data-sort="name">{{ __('Товар') }}</th>
                                            <th scope="col" class="sort" data-sort="name">{{ __('Количество') }}</th>
                                            <th scope="col" class="sort" data-sort="budget">{{ __('Сумма') }}</th>
                                            <th scope="col" class="sort" data-sort="status">{{ __('Цена за единицу') }}</th>
                                            <th scope="col" class="sort" data-sort="completion">{{ __('Статус') }}</th>
                                            <th scope="col"></th>
                                        </tr>
                                        </thead>
                                        <tbody class="list">
                                        @foreach($products as $product)
                                            <tr>
                                                <th scope="row">
                                                    <div class="media align-items-center">
                                                        <a href="#" class="avatar rounded-circle mr-3">
                                                            <img alt="Image placeholder" src="{{ asset($product->type->img) }}">
                                                        </a>
                                                        <div class="media-body">
                                                            <span class="name mb-0 text-sm">{{ $product->type->name }}</span>
                                                        </div>
                                                    </div>
                                                </th>
                                                <td class="budget">
                                                    {{ $product->qty }} {{ __('шт.') }}
                                                </td>
                                                <td class="budget">
                                                    {{ $product->type->price }} {{ __('руб') }}
                                                </td>
                                                <td class="budget">
                                                    {{ $product->type->price }} {{ __('руб') }}
                                                </td>
                                                <td>
                    <span class="badge badge-dot mr-4">
                      <i class="bg-{{ $product->status->value }}"></i>
                      <span class="status">{{ $product->status->name }}</span>
                    </span>
                                                </td>
{{--                                                <td>--}}
{{--                                                    <div class="d-flex align-items-center">--}}
{{--                                                        <span class="completion mr-2">60%</span>--}}
{{--                                                        <div>--}}
{{--                                                            <div class="progress">--}}
{{--                                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60"--}}
{{--                                                                     aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </td>--}}
                                                <td class="text-right">
                                                    <div class="dropdown">
                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown"
                                                           aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                            <a class="dropdown-item" href="#">Action</a>
                                                            <a class="dropdown-item" href="#">Another action</a>
                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

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
