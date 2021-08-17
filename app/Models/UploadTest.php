<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadTest extends Model
{
    use HasFactory;
    public $table= "uploaded_test";

    public function student(){
    	return $this->hasOne('App\Models\CallLeads', 'id','student_id');
    }

    public function tutor(){
    	return $this->hasOne('App\Models\User', 'id','tutor_id');
    }

    public function test(){
    	return $this->hasOne('App\Models\IeltsTest', 'id','test_id');
    }

}
