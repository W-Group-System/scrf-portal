<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function head()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
