<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieApproveRequest;
use App\Http\Requests\MovieStoreRequest;
use App\Http\Resources\MovieResource;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Role;
use App\Models\Status;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return MovieResource::collection(
            Movie::with('author')
                ->with('approver')
                ->with('genres')
                ->with('posters')
                ->with('status')
                ->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return MovieResource
     */
    public function store(MovieStoreRequest $request)
    {
        $field = $request->validated();

        if($field['author_id'] != Auth::user()->id)
        {
            return response("",Response::HTTP_BAD_REQUEST);
        }

        foreach($field['genres'] as $genre_id) {
            Genre::findorFail($genre_id);
        };

        $created_movie = Movie::create($field);


        foreach($field['genres'] as $genre_id) {
            $created_movie->genres()->attach($genre_id);
        };

        return new MovieResource($created_movie);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return MovieResource
     */
    public function show($id)
    {
        return new MovieResource(
            Movie::with('author')
                ->with('approver')
                ->with('genres')
                ->with('posters')
                ->with('status')
                ->findOrFail($id));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return MovieResource
     */
    public function getTrashMovie($id)
    {
        $currentMovie = Movie::withTrashed()->where('id',$id)->first();
        if($currentMovie->trashed()){
            if(Auth::user() != null) {
                if ($currentMovie['author_id'] == Auth::user()->id) {
                    //dd($currentMovie);
                    return new MovieResource($currentMovie);
                }
            }
            return response("",Response::HTTP_BAD_REQUEST);
        }
        else {
            return new MovieResource($currentMovie);
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getApproved(Request $request)
    {
        if($request->has('page') or $request->has('limit')) {

            $perPage = $request->has('limit') ? $request->limit : 10;
            $approvedMovie = Movie::where('status_id','=',Status::APPROVED_ID)->paginate($perPage);
            return  MovieResource::collection($approvedMovie);
        }
        else {
            $approvedMovie = Movie::where('status_id','=',Status::APPROVED_ID)->get();
            return  MovieResource::collection($approvedMovie);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getMovieByUserToken(Request $request)
    {
        if($request->has('page') or $request->has('limit')) {

            $perPage = $request->has('limit') ? $request->limit : 10;
            $myMovie = Movie::withTrashed()->where('author_id',Auth::user()->id)->paginate($perPage);
            return  MovieResource::collection($myMovie);
        }
        else {
            $myMovie = Movie::withTrashed()->where('author_id',Auth::user()->id)->get();
            return  MovieResource::collection($myMovie);
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getAllMovieByAdmin(Request $request)
    {
        if($request->has('page') or $request->has('limit')) {

            $perPage = $request->has('limit') ? $request->limit : 10;
            $allMovie = Movie::withoutTrashed()->paginate($perPage);
            return  MovieResource::collection($allMovie);
        }
        else {
            $allMovie = Movie::withoutTrashed()->get();
            return  MovieResource::collection($allMovie);
        }
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return MovieResource
     */
    public function update(MovieStoreRequest $request, Movie $movie)
    {
        $movie->update($request->validated());

        return new MovieResource($movie);
    }
    /**
     * Publish the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function publish($id)
    {
        $currentMovie = Movie::findorFail($id);
        if($currentMovie == null)
        {
            return response("",Response::HTTP_BAD_REQUEST);
        }
        if($currentMovie['author_id'] != Auth::user()->id)
        {
            return response("",Response::HTTP_FORBIDDEN);
        }
        if($currentMovie->status_id != Status::DRAFT_ID)
        {
            return response("",Response::HTTP_BAD_REQUEST);
        }
        $currentMovie->status_id = Status::PUBLISHED_ID;
        $currentMovie->save();
        return new MovieResource($currentMovie);
    }
    /**
     * Publish the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function canceledPublish($id)
    {
        $currentMovie = Movie::findorFail($id);
        if($currentMovie == null)
        {
            return response("",Response::HTTP_BAD_REQUEST);
        }
        if($currentMovie['author_id'] != Auth::user()->id)
        {
            return response("",Response::HTTP_FORBIDDEN);
        }
        if($currentMovie->status_id != Status::PUBLISHED_ID)
        {
            return response("",Response::HTTP_BAD_REQUEST);
        }
        $currentMovie->status_id = Status::DRAFT_ID;
        $currentMovie->save();
        return new MovieResource($currentMovie);
    }
    /**
     * Restore the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $currentMovie = Movie::withTrashed()->where('id',$id)->first();
        if($currentMovie == null)
        {
            return response("",Response::HTTP_BAD_REQUEST);
        }
        if($currentMovie['author_id'] != Auth::user()->id)
        {
            return response("",Response::HTTP_FORBIDDEN);
        }
        if($currentMovie->status_id != Status::TRASHED_ID)
        {
            return response("",Response::HTTP_BAD_REQUEST);
        }

        $currentMovie->status_id = Status::DRAFT_ID;
        $currentMovie->restore();
        $currentMovie->save();
        return new MovieResource($currentMovie);
    }

    /**
     * Soft Delete the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function softDelete($id)
    {
        $currentMovie = Movie::findorFail($id);
        if($currentMovie == null)
        {
            return response("",Response::HTTP_BAD_REQUEST);
        }
        if($currentMovie['author_id'] != Auth::user()->id)
        {
            return response("",Response::HTTP_FORBIDDEN);
        }
        if($currentMovie->status_id != Status::DRAFT_ID)
        {
            return response("",Response::HTTP_BAD_REQUEST);
        }
        $currentMovie->delete();
        if($currentMovie->trashed())
        {
            $currentMovie->status_id = Status::TRASHED_ID;
            $currentMovie->save();
        }
        return response("",Response::HTTP_NO_CONTENT);
    }

    /**
     * Destroy the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forceDestroy($id)
    {
        // NEED A CASCADE
        /*
        $currentMovie = Movie::withTrashed()->where('id',$id)->first();
        if($currentMovie == null)
        {
            return response("",Response::HTTP_BAD_REQUEST);
        }
        if($currentMovie['author_id'] != Auth::user()->id)
        {
            return response("",Response::HTTP_FORBIDDEN);
        }
        if($currentMovie->status_id != Status::TRASHED_ID)
        {
            return response("",Response::HTTP_BAD_REQUEST);
        }
        */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function approveMovie(MovieApproveRequest $request)
    {
        if(Auth::user()->role_id != Role::ADMIN_ID) {
            return response("",Response::HTTP_FORBIDDEN);
        }
        $field = $request->validated();
        $currentMovie = Movie::findorFail($field['movieId']);
        if($currentMovie == null)
        {
            return response("",Response::HTTP_BAD_REQUEST);
        }
        if($currentMovie->status_id != Status::PUBLISHED_ID)
        {
            return response("",Response::HTTP_BAD_REQUEST);
        }

        $currentMovie->approving($field['decision'],Auth::user()->id);
        $currentMovie->save();
        return new MovieResource($currentMovie);
    }
}
