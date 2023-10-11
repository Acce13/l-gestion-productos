<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    const PAID = "Pagado";
    const DELIVERED = "Delivered";

    protected $fillable = [
        'user_id',
        'date',
        'amount',
        'final_amount',
        'state'
    ];

    public function getFinalAmount()
    {
        return number_format($this->final_amount);
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function productItems()
    {
        return $this->hasMany(ProductOrder::class);
    }
}
