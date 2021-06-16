<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    //protected $primaryKey = "id"; nếu là id thì ko cần khai báo
    protected $fillable = ["name"];
    // public $timestamps = true; mặc định là true , nghĩa là tự động cập nhật giá trị cho 2 cột created_at và updated_at
}
