<?php

namespace App\Models;

use App\Models\Scopes\ActiveNews;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use function App\Helpers\getLanguage;

class News extends Model
{
    protected $table = 'news';

    /*
     * ========================== Relationships ==========================
     * */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'news_tags');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'author_id');
    }


    /* ========================== Scopes ==========================  */

    /* Scope for Active items */
    public function scopeActiveNews(Builder $query): void
    {
        $query->where([
            'is_approved' => '1',
            'status' => 'active'
        ]);
    }

    /* Scope for Check Language */
    public function scopeWithLocalize(Builder $query): void
    {
        $query->where('language', getLanguage());
    }

//    public function scope()
//    {
//
//    }

}
