<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'author_id',
        'post_title',
        'slug',
        'meta_title',
        'meta_description',
        'meta_tags',
        'post_schema',
        'green_text',
        'red_text',
        'black_text',
        'faqs',
        'post_detail',
        'post_cover_image',
        'post_og_image',
        'post_status',
        'post_view',
    ];
}
