<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nim',
        'prodi',
        'image_url',
        'hobi',
        'skills',
        'email',
        'domisili',
    ];

    protected $casts = [
        'hobi' => 'array',
        'skills' => 'array',
    ];

    public function activities(): HasMany
    {
        return $this->hasMany(Activity::class);
    }
}

