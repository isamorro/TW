<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'name',
        'description',
        'capacity',
        'image_path',
    ];
    public function sessions()
    {
        return $this->hasMany(SessionActivity::class);
    }
}

