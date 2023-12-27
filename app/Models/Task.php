<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;


    //*Se crean las funciones necesarias para determinar la relación entre tablas
    //*En este caso la tabla Tasks tiene una relción hasMany con la tabla Users

    
    public function user(){
    
        return $this->belongsTo(User::class);

    }

    public function companies(){
        
        return $this->belongsTo(Companies::class, 'company_id');
    }
}
