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
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function boardColumn()
    {
        return $this->hasMany(BoardColumn::class);
    }
}
