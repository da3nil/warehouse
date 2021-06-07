@extends('layouts.app', ['title' => __('Список товаров')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Список заявок'),
        'description' => __('Это страница заявок. Здесь вы можете просмотреть все существующие заявки.'),
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

                        <div class="table-responsive">
                            <div>
                                <table class="table align-items-center">
                                    <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="name">{{ __('ID') }}</th>
                                        <th scope="col" class="sort" data-sort="name">{{ __('Сумма') }}</th>
                                        <th scope="col" class="sort"
                                            data-sort="status">{{ __('Телефон') }}</th>
                                        <th scope="col">Дата</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody class="list">
                                    @foreach($orders as $order)
                                        <tr>
                                            <td class="budget">
                                                {{ $order->id }}
                                            </td>
                                            <td class="budget">
                                                {{ $order->total }} {{ __('руб.') }}
                                            </td>
                                            <td class="budget">
                                                {{ $order->phone }} {{ __('руб.') }}
                                            </td>
                                            <td class="budget">
                                                {{ $order->created_at }}
                                            </td>
                                            <td class="text-right">
                                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary">Открыть</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="mt-5 d-flex justify-content-center">
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
