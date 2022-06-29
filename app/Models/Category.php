<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    protected $fillable = ['category_name','parent_id'];







    public function scopeParent($query){
        return $query -> whereNull('parent_id');
    }






    public function scopeChild($query){
        return $query -> whereNotNull('parent_id');
    }





    public function _parent(){
        return $this->belongsTo(self::class, 'parent_id');
    }



    public function childrens(){
        return $this -> hasMany(Self::class,'parent_id');
    }


    public function products()
    {
        return $this -> belongsToMany(Product::class,'product_categories');
    }
}
