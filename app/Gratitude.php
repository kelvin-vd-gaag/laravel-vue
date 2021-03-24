<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gratitude extends Model
{

    protected $fillable = ['content','user_id','id'];

    public function user(){
        return $this->hasOne(User::class);
    }
}
