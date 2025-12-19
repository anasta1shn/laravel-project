@extends('admin._panel')

@section('content')
    <h4>Заказы</h4>
    <div class="table-responsive">
        <table class="table align-middle table-hover">
            <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Дата</th>
                <th>Статус</th>
                <th>Номер телефона</th>
                <th>Адрес доставки</th>
                <th>Заказчик</th>
                <th class="text-center">Действия</th>

            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>
                        {{ $order->id }}
                    </td>
                    <td>
                        {{ \Carbon\Carbon::parse($order->date)->setTimezone('Asia/Yekaterinburg')->format('d.m.Y в H:i') }}
                    </td>
                    <td>
                        {{ STATUSES[$order->status] }}
                    </td>
                    <td>
                        {{ $order->client_phone }}
                    </td>
                    <td>
                        {{ $order->client_address }}
                    </td>
                    <td>
                        {{ $order->user->username }}
                    </td>
                    <td class="text-center">
                        <a href="{{ route('orders.edit', $order) }}" role="button" class="btn btn-sm btn-outline-secondary">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @if(!$orders->isEmpty())
        {{ $orders->links() }}
    @endif
@endsection
