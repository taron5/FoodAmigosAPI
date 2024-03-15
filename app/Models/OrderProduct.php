<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;


    protected $table = 'order_product';
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'count',
        'amount',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'id', 'order_id');
    }
}
