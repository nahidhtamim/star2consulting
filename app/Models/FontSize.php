<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FontSize extends Model
{
    use HasFactory;

    protected $table = 'font_sizes';

    protected $fillable = [
        'name',
        'used',
        'font_size',
        'font_weight',
        'line_height',
        'min_width_font_size',
    ];
}
