<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoardColumn extends Model
{
    public function projectTask()
    {
        return $this->hasMany(ProjectTask::class,'board_column_id');
    }
}
