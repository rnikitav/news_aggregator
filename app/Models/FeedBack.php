<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FeedBack
 *
 * @property int $id
 * @property int $user_id
 * @property string $email
 * @property string|null $subject
 * @property string $description
 * @property string $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|FeedBack newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FeedBack newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FeedBack query()
 * @method static \Illuminate\Database\Eloquent\Builder|FeedBack whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedBack whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedBack whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedBack whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedBack whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedBack whereUserId($value)
 * @mixin \Eloquent
 */
class FeedBack extends Model
{
    use HasFactory;

    protected $table = 'feedbacks';

    protected $fillable = ['user_id', 'email', 'subject', 'description'];
    public $timestamps = false;
}
