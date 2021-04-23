<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
      'google_analytic',
      'web_master',
      'bing_master',
      'og_image',
      'logo_image',
      'favicon',
      'smtp_email',
      'smtp_password',
      'robots',
    ];
}
