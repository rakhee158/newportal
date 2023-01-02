<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
     protected $fillable = [
        'slug',
        'title',
        'detail',
        'image',
        'is_active',
        'sort_id',
        'created_by',
        'updated_by'    
    ];

    public function getUserOne()
    {
        return $this->hasOne(User::class,'id','created_by');
    }
}
