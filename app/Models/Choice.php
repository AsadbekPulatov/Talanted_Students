<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    use HasFactory;

    public function tasks(){
        return $this->hasMany(ChoiseUser::class, 'task_id', 'id');
    }
}
