<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class image extends Model
{
    use HasFactory;

    protected $fillable = ["name", "path", "project_id"];

    public function project(): BelongsTo
    {
        return $this->belongsTo(project::class);
    }
}
