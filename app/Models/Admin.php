<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory,Notifiable;

    protected $table = "admins";

    protected $guarded = "admin";// phản ánh xem khu vực hoạt động

    protected $fillable = [
        "name",
        "email",
        "password",
    ];

    protected $hidden = [ // Những column mà khi get data sẽ dấu đi
        'password',
        'remember_token'
    ];
}
