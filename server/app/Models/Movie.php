<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'link',
        'author_id',
    ];

    protected $hidden = ['pivot'];
    protected $dates = ['deleted_at'];

    public function approving(bool $decision,int $approver_id)
    {
        if($decision) {
            $this->status_id = Status::APPROVED_ID;
            $this->approver_id = $approver_id;
        }
        else {
            $this->status_id = Status::DRAFT_ID;
            $this->approver_id = null;
        }
    }


    public function author() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function approver() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public  function status() : BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function genres() :BelongsToMany
    {
        return $this->belongsToMany(Genre::class);
    }

    public function posters() : BelongsToMany
    {
        return $this->belongsToMany(File::class,'poster_movie');
    }

    public function galleries() : BelongsToMany
    {
        return $this->belongsToMany(File::class,'gallery_movie');
    }
}
