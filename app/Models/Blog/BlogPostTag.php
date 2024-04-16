<?php

namespace App\Models\Blog;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPostTag extends Model
{
    use HasFactory;

    protected $table = 'blog_post_tags';

    protected $fillable = [
        'blog_post_id',
        'blog_tag_id',
    ];    
}
