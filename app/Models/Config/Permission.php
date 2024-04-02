<?php

namespace App\Models\Config;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function role()
    {
        return $this->belongsToMany(\App\Models\Config\Role::class, 'role_has_permissions');
    }
}
