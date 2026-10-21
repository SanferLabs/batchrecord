<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BatchUser extends Model
{
    protected $table = 'batch_users';

    protected $fillable = [
        'name',
        'email',
        'role',
        'is_protected',
    ];

    protected $casts = [
        'is_protected' => 'boolean',
    ];
}
