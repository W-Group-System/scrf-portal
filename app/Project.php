<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function projectMembers()
    {
        return $this->hasMany(ProjectMember::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
