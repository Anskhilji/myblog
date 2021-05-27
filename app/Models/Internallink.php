<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internallink extends Model
{
    use HasFactory;
    protected $fillable = ['target','types_of_links','max_links_in_one_article','fixed_percent','max_links_limit','max_links_on_same_anchor_text','max_links_on_different_anchor_text','max_links_on_its_own_article'];
}
