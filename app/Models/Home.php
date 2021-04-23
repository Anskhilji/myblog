<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;
    protected $fillable = [
        'page_title',
        'meta_title',
        'meta_description',
        'meta_description',
        'meta_tags',
        'home_schema',
        'og_image',
        'detail',
    ];
}
