<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenreStoreRequest;
use App\Http\Resources\GenreResource;
use App\Models\Genre;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return  GenreResource::collection((Genre::all()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return GenreResource
     */
    public function store(GenreStoreRequest $request)
    {
        if(Auth::user()->role_id != Role::ADMIN_ID) {
            return Response::HTTP_FORBIDDEN;
        }
        $created_genre = Genre::create($request->validated());

        return new GenreResource($created_genre);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return GenreResource
     */
    public function show($id)
    {
        return new GenreResource(Genre::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return GenreResource
     */
    public function update(GenreStoreRequest $request, Genre $genre)
    {
        if(Auth::user()->role_id != Role::ADMIN_ID) {
            return Response::HTTP_FORBIDDEN;
        }
        $genre->update($request->validated());

        return new GenreResource($genre);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        if(Auth::user()->role_id != Role::ADMIN_ID) {
            return Response::HTTP_FORBIDDEN;
        }
        //Need a cascade delete
        $genre->delete();

        return response(null,Response::HTTP_NO_CONTENT);
    }
}
