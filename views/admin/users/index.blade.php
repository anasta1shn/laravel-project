@extends('admin._panel')

@section('content')
    <h4>Пользователи</h4>
    <div class="table-responsive">
        <table class="table align-middle table-hover">
            <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Имя</th>
                <th>Почта</th>
                <th>Пароль</th>
                <th>Адрес доставки</th>
                <th>Номер телефона</th>
                <th>Роль</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>
                        {{ $user->id }}
                    </td>
                    <td>
                        {{ $user->username }}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>
                        ********
                    </td>
                    <td>
                        {{ $user->address ?? 'Не указан' }}
                    </td>
                    <td>
                        {{ $user->phone_number ?? 'Не указан' }}
                    </td>
                    <td>
                        {{ $user->role->title }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('users.create') }}" role="button" class="btn btn-sm btn-primary mb-1">
        <i class="fa-solid fa-plus"></i> Добавить
    </a>

    @if(!$users->isEmpty())
        {{ $users->links() }}
    @endif
@endsection
