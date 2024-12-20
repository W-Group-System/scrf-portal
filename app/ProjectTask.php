<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectTask extends Model
{
    public function assignedTo()
    {
        return $this->belongsTo(User::class,'assigned_to');
    }
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function attachments()
    {
        return $this->hasMany(ProjectAttachment::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class,'reporter');
    }
}
