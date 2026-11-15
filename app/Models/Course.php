<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
     public function lecturer(){
        return $this->belongsTo(Lecturer::class);
    }

      public function lectures(){
        return $this->hasMany(Lecture::class);
    }


    public function users(){
        return $this->belongsToMany(User::class);
    }
}
