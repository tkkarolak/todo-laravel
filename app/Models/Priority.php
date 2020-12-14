<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Priority extends Model
{
    public $timestamps = false;
    use HasFactory;

    public function job() {
        return $this->hasMany(Job::class);
    }

}
