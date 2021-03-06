<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\News;


class NewsCat extends Model
{
    use HasFactory;
    protected $table = 'news_cat';

    protected $fillable = [
        'name',
        'state',
    ];

    public function news()
    {
        return $this->hasMany(News::class);
    }
}
