<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceHomeSetting extends Model
{
    protected $fillable = [
        'title',
        'heading',
        'description',
        'highlights',
        'offerings',
    ];

    protected function casts(): array
    {
        return [
            'highlights' => 'array',
            'offerings' => 'array',
        ];
    }
}
