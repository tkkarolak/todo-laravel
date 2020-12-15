<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;

    public function jobs() {

        return $this->belongsToMany(Job::class, 'job_tag', 'tag_id', 'job_id');
    }
}
