<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebContent extends Model
{
    use HasFactory;

    protected $table = 'web_contents';

    protected $fillable = [
        'title',
        'description',
        'media',
        'media_two',
        'status',
    ];
}
