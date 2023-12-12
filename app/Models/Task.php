<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    function user() {
        return $this->belongsToMany(User::class, 'task_users', 'user_id', 'task_id');
    }

    public function status() {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }
}
