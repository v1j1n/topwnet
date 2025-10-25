<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /** @use HasFactory<\Database\Factories\ServiceFactory> */
    use HasFactory;

    protected $fillable = [
        'image',
        'alt_text',
        'primary_label',
        'secondary_label',
        'title',
        'title_hover',
        'big_image',
        'description',
        'process',
        'outcomes',
        'sort_order',
        'status',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_image',
    ];

    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
            'process' => 'array',
            'outcomes' => 'array',
        ];
    }
}
