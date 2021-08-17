<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    use HasFactory;
    public $table = "applications";

    public function getCountry(){
    	return $this->hasOne('App\Models\Country','id','country_id');
    }

    public function getUniversity(){
    	return $this->hasOne('App\Models\University','id','university_id');
    }

    public function getCourseType(){
    	return $this->hasOne('App\Models\CourseType','id','course_type_id');
    }

    public function getCourse(){
    	return $this->hasOne('App\Models\Courses','id','course_id');
    }

    public function getIntake(){
    	return $this->hasOne('App\Models\Intake','id','intake');
    }

    public function getCampus(){
    	return $this->hasOne('App\Models\Campus','id','campus');
    }
}
