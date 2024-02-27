<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class project extends Model
{
    use HasFactory;
    
    public function user(): HasManyThrough
    {
        return $this->hasManyThrough(User::class, user_project::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(image::class);
    }
}
