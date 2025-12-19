<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

/**
 * @mixin Builder;
 */

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['status'];

    public function products() {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getTotalPrice() {
        $sum = 0;

        foreach ($this->products as $product) {
            $sum += $product->getTotalPrice();
        }

        return $sum;
    }

    public function saveOrder($address, $phone) {
        if (Str::startsWith($phone, '+7')) {
            $phone = substr($phone, 1);
        } else {
            $phone = '7' . substr($phone, 1);
        }

        $this->price = $this->getTotalPrice();
        $this->client_address = $address;
        $this->client_phone = $phone;
        $this->status = 1;
        $this->user_id = auth()->id();
        $this->save();

        session()->flash('success', 'Ваш заказ успешно оформлен и принят в работу.');

        return true;
    }

    public function userOrders() {
        $orders = Order::where('user_id', auth()->id());

        if (!isset($orders)) {
            return null;
        }

        return $orders;
    }
}
