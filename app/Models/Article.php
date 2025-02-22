<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Comment;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['id', 'title', 'content', 'author', 'user_id', 'slug'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'article_id', 'id');
    }
}
