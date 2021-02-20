<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
     protected $fillable=['category_id','title','description','cost_price','price']; 


 //Use for main key 
//Use for main key
  public function category()
  {
    return $this->belongsTo(Category::class);
  }
}
