<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $fillable = [
        "customer_name",
        "customer_tel",
        "customer_address",
        "grand_total",
        "status",// khi tao moi don hang, nen de status  = 0 (pending)
    ];
}
