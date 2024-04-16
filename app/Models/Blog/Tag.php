<?php

namespace App\Models\Blog;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    use Sluggable;

    public $table = 'blog_tags';

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true
            ]
        ];
    }
    public function blogs()
    {
        return $this->belongsToMany(Blog::class,'blog_post_tags', 'blog_tag_id', 'blog_post_id')->withTimestamps();
    }
}
