<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScrfApproval extends Model
{
    public function project_task()
    {
        return $this->belongsTo(ProjectTask::class);
    }
}
