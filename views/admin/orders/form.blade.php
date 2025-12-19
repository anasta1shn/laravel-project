@extends('admin._panel')

@section('content')
    <h4>{{ $form_title }}</h4>

    <form method="POST" action="{{ route('orders.update', $order) }}">
        @method('PUT')

        <div class="mb-3 col-xl-5 col-lg-7 col-md-9">
            <label for="orderDate" class="form-label">Дата</label>
            <input type="text" class="form-control"
                   id="orderDate" name="date" value="{{ \Carbon\Carbon::parse($order->date)->setTimezone('Asia/Yekaterinburg')->format('d.m.Y в H:i') }}" disabled>
        </div>
        <div class="mb-3 col-xl-5 col-lg-7 col-md-9">
            <label for="productSelectCategory" class="form-label">Статус</label>
            <select class="form-select" aria-label="Выберите категорию продукции" id="productSelectCategory" name="status">
                @foreach(STATUSES as $statusId => $statusTitle)
                    <option value="{{ $statusId }}" @if($order->status === $statusId) selected @endif @if(!in_array($statusId, availableStatuses($order->status))) disabled @endif>{{ $statusTitle }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 col-xl-5 col-lg-7 col-md-9">
            <label for="orderPhone" class="form-label">Номер телефона</label>
            <input type="text" class="form-control"
                   id="orderPhone" name="phone" value="{{ $order->client_phone }}" disabled>
        </div>
        <div class="mb-3 col-xl-5 col-lg-7 col-md-9">
            <label for="orderAddress" class="form-label">Адрес доставки</label>
            <input type="text" class="form-control"
                   id="orderAddress" name="address" value="{{ $order->client_address }}" disabled>
        </div>
        <div class="mb-3 col-xl-5 col-lg-7 col-md-9">
            <label for="orderCustomer" class="form-label">Заказчик</label>
            <input type="text" class="form-control"
                   id="orderCustomer" name="customer" value="{{ $order->user->username }}" disabled>
        </div>

        @csrf
        <button type="submit" class="btn btn-sm btn-success">Сохранить</button>
    </form>
@endsection



