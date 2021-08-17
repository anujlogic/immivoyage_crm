<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    public $table = "client";

    public function client_image(){
    	return $this->hasOne('App\Models\ClientImages', 'client_id','id');
    }

    public function manager(){
        return $this->belongsTo('App\Models\User','manage_id','id');
    }

    public function client_account(){
        return $this->belongsTo('App\Models\User','account_id','id');
    }
}