<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Role extends Model
{
    use HasFactory;
    public $table = 'role';
    //白名单
    protected $fillable = [
        'role_id',
        'name'
    ];
    //反向关联模型user
    public function Role()
    {
        return $this->hasMany(User::class, 'role', 'id');
    }
    //关联权限表
    public function jur()
    {
        return $this->hasOne(Jurisdiction::class, 'id', 'jui_id');
    }
}
