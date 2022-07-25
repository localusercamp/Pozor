<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    const DRAFT_ID = 1;
    const DRAFT = 'Draft'; // OVERDOSE BAD CONST

    const TRASHED_ID = 2;
    const TRASHED = 'Trashed'; // OVERDOSE BAD CONST

    const PUBLISHED_ID = 3;
    const PUBLISHED = 'Published'; // OVERDOSE BAD CONST

    const APPROVED_ID = 4;
    const APPROVED = 'Approved'; // OVERDOSE BAD CONST


}
