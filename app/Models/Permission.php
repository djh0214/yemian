<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    public $table = 'permissions';
    public function role()
    {
        return $this->belongsTo(Role::class, 'id', 'jur_id');
    }
}