<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsComment extends Model
{
    use HasFactory;

    protected $fillable = ['comment', 'news_id'];

    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
