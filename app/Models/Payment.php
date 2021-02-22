<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['amount','date','note','user_id','admin_id'];

    public function admin()
    {
     return $this->belongsTo(Admin::class);
    }
}
