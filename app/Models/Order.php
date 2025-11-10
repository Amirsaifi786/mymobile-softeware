<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table="orders";
    protected $fillable = [
        'productid',
        'quantity',
        'price',
        'txnid',
        'orderid',
        'payment_method',
        'userid',
        'status',
        'date',
        'txnStatusCode',
        'userMobileNo',
        'merchantRefId',
        'amount',
        'udf1',
        'udf2',
        'udf3',
        'txnStatus',
        'bankRefId',
        'rrn',
        'payerVPA',
        'param',
        'order_data',
    ];


}
