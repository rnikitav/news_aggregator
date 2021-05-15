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
 * @property int $id
 * @property int $idCategory
 * @property int $source_id
 * @property string $slug
 * @property string $title
 * @property string $desc Короткое описание Новости
 * @property int $views
 * @property int $likes
 * @property int $dislikes
 * @property string $img
 * @property string $body Тело Новости HTML
 * @property bool $is_private Доступна ли новость для
 *                 неавторизованных пользователей
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $categories
 * @property-read int|null $categories_count
 * @property-read \App\Models\Source|null $resource
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News query()
 * @method static \Illuminate\Database\Eloquent\Builder|News whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereDislikes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereIdCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereIsPrivate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereLikes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereSourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereViews($value)
 */

class News extends Model
{
    use HasFactory;

    protected $table = "news";
    protected $perPage = 5;
    protected $primaryKey = 'id';
    protected $fillable = ['idCategory', 'source_id', 'slug', 'title', 'desc', 'img', 'body', 'is_private', 'pubDate'];
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
