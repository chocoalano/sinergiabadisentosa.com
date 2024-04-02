<?php

namespace App\Models\Services;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Superiority extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'svg',
        'description',
    ];
}
