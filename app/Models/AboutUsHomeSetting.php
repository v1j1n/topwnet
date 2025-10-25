<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUsHomeSetting extends Model
{
    protected $fillable = [
        'title',
        'heading',
        'description',
        'points',
        'status',
        'image',
    ];

    protected function casts(): array
    {
        return [
            'points' => 'array',
        ];
    }
}
