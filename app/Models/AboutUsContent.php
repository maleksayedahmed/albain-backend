<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsContent extends Model
{
    use HasFactory;

    protected $table = 'about_us_contents';

    protected $fillable = [
        'section_title',
        'paragraph_1',
        'paragraph_2',
        'paragraph_3',
        'list_items',
    ];
} 