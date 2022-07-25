<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FileStoreRequest;
use App\Http\Resources\ImageResource;
use App\Models\File;
use App\Models\Movie;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GalleryController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return ImageResource
     */
    public function uploadById(int $id, FileStoreRequest $request)
    {
        $currentMovie = Movie::findorFail($id);
        if($currentMovie != null) // REFACTOR TO GUARD-TYPE IF
        {
            $file = $request->file('image');
            if($file != null) {
                
                // REFACTOR? UNITE INTO SINGLE FUNC?
                $name = File::generateUniqueFilename();
                $extension = File::generateFileExtension($file);
                $path = File::generateSavedPath($currentMovie->title,File::GALLERY_PATH);

                $created_gallery = File::create([
                    'name' => $name,
                    'extension' => $extension,
                    'path' => $path,
                ]);

                $isFileSaved = $created_gallery->saveFile($file);
                //dd(Storage::url($created_poster->getPath()));
                if ($isFileSaved) { // REFACTOR? EXCEPTION IF NOT SAVED?

                    $currentMovie->galleries()->attach($created_gallery->id);

                    return new ImageResource($created_gallery);
                }
            }
        }
        return response("",Response::HTTP_BAD_REQUEST);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
