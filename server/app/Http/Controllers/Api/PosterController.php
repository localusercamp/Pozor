<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FileStoreRequest;
use App\Http\Resources\ImageResource;
use App\Http\Resources\PosterResource;
use App\Models\Movie;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class PosterController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return ImageResource
     */
    public function uploadById(FileStoreRequest $request)
    {
        $currentMovie = Movie::findorFail($request->id);
        if($currentMovie != null)
        {
            $file = $request->file('image');
            if($file != null) {

                $name = File::generateUniqueFilename();
                $extension = File::generateFileExtension($file);
                $path = File::generateSavedPath($currentMovie->title,File::POSTER_PATH);

                $created_poster = File::create([
                    'name' => $name,
                    'extension' => $extension,
                    'path' => $path,
                ]);

                $isFileSaved = $created_poster->saveFile($file);
                if ($isFileSaved) {

                    $currentMovie->posters()->attach($created_poster->id);

                    return new ImageResource($created_poster);
                }
                return response("",Response::HTTP_INTERNAL_SERVER_ERROR);
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
