<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * App\Models\Categories
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Category find($value)
 * @mixin \Eloquent
 */

class News extends Model
{
    use HasFactory;

    protected $table = "news";
    protected $primaryKey = 'id';
    protected $fillable = ['idCategory', 'source_id', 'slug', 'title', 'desc', 'img', 'body', 'is_private'];
    protected $casts = [
        'is_private' => 'boolean'
    ];


    public function categories()
    {
        return $this->hasMany(Category::class, 'id', 'idCategory');
    }
    public function resource()
    {
        return $this->hasOne(Source::class, 'id', 'source_id' );
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'news_tags', 'news_id', 'tag_id');
    }


}
