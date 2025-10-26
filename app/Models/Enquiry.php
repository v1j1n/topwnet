<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    /** @use HasFactory<\Database\Factories\EnquiryFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'service_name',
        'message',
    ];
}
