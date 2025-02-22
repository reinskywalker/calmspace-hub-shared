<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $fillable = ['id', 'article_id', 'author', 'content'];

    public $incrementing = false;
    protected $keyType = 'string';

    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
}
