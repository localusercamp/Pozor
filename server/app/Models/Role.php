<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    const ADMIN_ID = 1;
    const ADMIN = 'Administrator'; // OVERDOSE BAD CONST

    const MODER_ID = 2;
    const MODER = 'Moderator'; // OVERDOSE BAD CONST

    // OVERDOSE UNUSED FIELDS
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    /**
     * Get the users for the role.
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
