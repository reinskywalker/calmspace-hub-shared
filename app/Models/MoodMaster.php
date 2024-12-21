<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoodMaster extends Model
{
    use HasFactory;

    protected $table = 'mood_master';
    protected $fillable = ['id', 'name', 'code'];
    public $incrementing = false;
    protected $keyType = 'string';
}
