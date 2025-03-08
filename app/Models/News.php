<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class News extends Model
{
    protected $table = 'news';


//    protected $fillable = [
//        'language',
//        'category_id',
//        'title',
//        'slug',
//        'description',
//        'image',
//        'author_id',
//        'meta_title',
//        'meta_description',
//        'is_breaking_news',
//        'show_at_slider',
//        'show_at_popular',
//        'status',
//    ];

    /*
     * ========================== Relationships ==========================
     * */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'news_tags');
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'author_id');
    }
}
