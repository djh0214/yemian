<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    public $table = 'report';
    //白名单
    protected $fillable = [
        'report_id',
        'daily',
        'weekly',
        'monthly',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'report_id', 'id');
    }
}