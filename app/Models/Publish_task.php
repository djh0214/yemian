<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publish_task extends Model
{
    use HasFactory;
    public $table = 'publish_task';
    protected $fillable = [
        'publish_task',
        'task_progress',
        'publisher',
        'rec_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'pub_id', 'id');
    }
}
