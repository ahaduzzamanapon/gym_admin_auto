<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales_productModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_id',
        'member_id',
        'sale_date',
        'subtotal',
        'discount',
        'tax',
        'total_amount',
        'payment_method',
        'status',
        'payment_note',
    ];

    public function items()
    {
        return $this->hasMany(Sales_product_itemModel::class, 'sale_id');
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
}
