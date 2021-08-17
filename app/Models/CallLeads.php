<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallLeads extends Model
{
    use HasFactory;
    public $table="call_leads";

    public function manager(){
        return $this->belongsTo('App\Models\User','manage_by','id');
    }
}
