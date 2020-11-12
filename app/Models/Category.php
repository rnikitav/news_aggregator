<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";
    protected $fillable = ['name', 'slug'];

    public function newsListByCategory()
    {
        return $this->hasMany(News::class, 'idCategory');
    }

}
