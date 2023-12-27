<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tasks', 
    ];

    public function getTasksAttribute($value)
    {
        return json_decode($value, true);
    }

    public function task(){

        return $this->hasMany(Task::class, 'company_id');

    }
}
