<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\User;
use App\Models\Lecture;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
    public function lecture(): BelongsToMany
    {
        return $this->belongsToMany(Lecture::class);
    }
}
