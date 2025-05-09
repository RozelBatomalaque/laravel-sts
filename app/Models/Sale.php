<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'item_id',
        'quantity_sold', 
        'total_price',
        'sale_date'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'sale_date' => 'datetime',
        'total_price' => 'decimal:2',
    ];

    /**
     * Get the user associated with the sale.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the item associated with the sale.
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}