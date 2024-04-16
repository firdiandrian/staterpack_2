<?php

namespace App\Models\Blog;

use App\User;
use App\Models\Traits\UploadImage;
use App\Models\Blog\BlogPostTag;
use App\Models\Blog\Tag;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use Sluggable;
    use UploadImage;

    public $table = 'blog_posts';

    protected $fillable = [
        'title',
        'user_id',
        'blog_category_id',
        'description',
        'image',
        'published_at',
        'count_view', 
        'count_share',
        'count_like', 
    ];

    protected $dates = [
        'published_at'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true
            ]
        ];
    }

    public function showImage()
    {
        if (Storage::exists($this->image)) {
            return "storage/$this->image";
        }
        return asset('static/admin/img/default.png');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'blog_category_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    public function scopeDraft($query)
    {
        return $query->where(function () use ($query) {
            $query->whereNull('published_at')
                ->orWhere('published_at', '>', now());
        });
    }

    public function getIsPublishedAttribute()
    {
        return $this->published_at <= now();
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_post_tags', 'blog_post_id', 'blog_tag_id')->withTimestamps();
    }
    
}
