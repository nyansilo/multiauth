<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;


    protected $table = 'orders';
    protected $fillable = [
        'user_id', 
        'approver_id',
        'authorizer_id',
        'department_id',
        'user_sign',
        'approver_sign',
        'authorizer_sign',
        'tracking_no',
        'status_message',
    ];

    /**
     * Get all of the orderItems for the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(orderItem::class, 'order_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }



    public function approver(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'approver_id', 'id');
    }


    public function authorizer(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'authorizer_id', 'id');
    }




}
