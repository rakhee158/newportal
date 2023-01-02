<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'title',
        'is_active',
        'sort_id',
        'created_by',
        'updated_by',
        'categories_id',  
    ];
    public function getUserOne()
    {
        return $this->hasOne(User::class,'id','created_by');
    }
     public function getCategory()
    {
        return $this->belongsTo(Category::class,'categories_id');
    }
}
