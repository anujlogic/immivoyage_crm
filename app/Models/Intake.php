<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intake extends Model
{
    use HasFactory;
    public $table = "intake";

    public function intakeUniversity(){
    	return $this->hasOne('App\Models\University','id','university_id');
    }

    public function intakeCourse(){
    	return $this->hasOne('App\Models\Courses','id','course_id');
    }
}
