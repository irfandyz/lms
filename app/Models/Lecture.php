<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\User;
use App\Models\Category;

class Lecture extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
    public function category(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
}
