<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public function priority() {

        return $this->belongsTo(Priority::class);
    }

    public function tags() {

        return $this->belongsToMany(Tags::class, 'job_tag', 'job_id', 'tag_id');
    }
}
