<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Boolean;

class File extends Model
{
    use HasFactory;

    const POSTER_PATH = 'posters';
    const GALLERY_PATH = 'galleries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'extension',
        'path',
    ];

    protected $guarded = [];

    public function getFilename() // REFACTOR TO ATTRIBUTE
    {
        return $this->name . $this->extension;
    }
    public function getUrl() // REFACTOR TO ATTRIBUTE
    {
        return Storage::url($this->path . '/' . $this->getFilename());
    }

    public function SaveFile($file): bool
    {
        // REFACTOR SINGLE RETURN
        if (!Storage::putFileAs($this->path, $file, $this->getFilename())) {
            return false;
        } else {
            return true;
        }
    }

    public static function generateUniqueFilename(): string
    {
        return Str::uuid();
    }
    public static function generateFileExtension($file): string
    {
        return  '.' . $file->extension();
    }
    public static function generateSavedPath($movieTitle, $pathForFiletype): string
    {
        $titleWithoutSpase = str_replace(' ', '', $movieTitle);
        return 'public/' . $titleWithoutSpase . '/' . $pathForFiletype;
    }
}
