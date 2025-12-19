<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder;
 */

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public $timestamps = false;

    protected $fillable = [
        'username',
        'email',
        'password',
        'phone_number',
        'address'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function orders() {
        return $this->belongsToMany(Product::class);
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function isAdmin() {
        return $this->role->id === 1;
    }

    public function saveName($name) {
        $this->username = $name;
        $this->save();

        session()->flash('success', 'Имя успешно изменено');

        return true;
    }

    public function saveEmail($email) {
        $this->email = $email;
        $this->save();

        session()->flash('success', 'Почта успешно изменена');

        return true;
    }

    public function savePassword($password) {
        $this->password = $password;
        $this->save();

        session()->flash('success', 'Пароль успешно изменен');

        return true;
    }

    public function saveAddress($address) {
        $this->address = $address;
        $this->save();

        session()->flash('success', 'Адрес доставки успешно изменен');

        return true;
    }

    public function savePhone($phone) {
        if (Str::startsWith($phone, '+7')) {
            $phone = substr($phone, 1);
        } else {
            $phone = '7' . substr($phone, 1);
        }

        $this->phone_number = $phone;
        $this->save();

        session()->flash('success', 'Номер телефона успешно изменен');

        return true;
    }
}
