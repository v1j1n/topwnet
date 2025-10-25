<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /** @use HasFactory<\Database\Factories\ClientFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'clients_list',
        'status',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'clients_list' => 'array',
            'sort_order' => 'integer',
        ];
    }
}
