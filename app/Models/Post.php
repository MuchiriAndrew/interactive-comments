<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'user_id',
        'parent_post_id',
        'content',
        'upvotes',
    ];


    //relationship with user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
