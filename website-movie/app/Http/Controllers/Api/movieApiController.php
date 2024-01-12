<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MoviesResource;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Request as FacadesRequest;

class movieApiController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return new MoviesResource(true,"Data Movies!",$movies);
    }

    public function show($id)
    {
        $movies = Movie::find($id);

        if($movies){
            return new MoviesResource(true, "Data Selected!",$movies);
        }else{
            return response()->json([
                'message' => 'Data not found!',
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'poster_path' => ['mimes:jpeg,png,bmp,tiff', 'max:4096'],
            'title' => 'required',
            'genres' => 'required',
            'studio' => 'required',
            'hours' => ['required', 'numeric', 'min:0', 'max:23'],
            'minutes' => ['required', 'numeric', 'min:0', 'max:59'],
            'director' => 'required',
            'actor' => 'required',
            'description' => 'required',
            'released_date' => ['required', 'before_or_equal:'. date("F j, Y")],
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }else{
            if($request->hasFile('poster_path')) {
                $validator->poster_path = FacadesRequest::file('poster_path')->store('poster', 'public');
            }
    
            $runtime = $request->input('hours') . ':' . $request->input('minutes');
            $genres = is_array($request->input('genres')) ? implode(',', $request->input('genres')) : $request->input('genres');

            $movies = Movie::create([
                'poster_path' => $request->poster_path,
                'title' => $request->title,
                'genres' => $genres,
                'studio' => $request->studio,
                'director' => $request->director,
                'actor' => $request->actor,
                'description' => $request->description,
                'released_date' => $request->released_date,
                'runtime' => $runtime, // Make sure to include this line
            ]);

            return new MoviesResource(true,'Data Successfully Saved!',$movies);
        }
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(),[
            'poster_path' => ['mimes:jpeg,png,bmp,tiff', 'max:4096'],
            'title' => 'required',
            'genres' => 'required',
            'studio' => 'required',
            'hours' => ['required', 'numeric', 'min:0', 'max:23'],
            'minutes' => ['required', 'numeric', 'min:0', 'max:59'],
            'director' => 'required',
            'actor' => 'required',
            'description' => 'required',
            'released_date' => ['required', 'before_or_equal:'. date("F j, Y")],
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }else{
            $movies = Movie::find($id);
            if($request->hasFile('poster_path')) {
                $movies->poster_path = FacadesRequest::file('poster_path')->store('poster', 'public');
            }
    
            $runtime = $request->input('hours') . ':' . $request->input('minutes');
            $genres = is_array($request->input('genres')) ? implode(',', $request->input('genres')) : $request->input('genres');
            if($movies){
                $movies->poster_path = $request->poster_path;                  
                $movies->title = $request->title;                  
                $movies->genres = $genres;                  
                $movies->studio = $request->studio;                                   
                $movies->director = $request->director;                  
                $movies->actor = $request->actor;                  
                $movies->description = $request->description;                  
                $movies->released_date = $request->released_date;
                $movies->runtime = $runtime;
                $movies->save();     
                
                return new MoviesResource(true,'Data Successfully Updated!',$movies);
            }else{
                return response()->json([
                    "message" => "Data Not Found!"
                ],422);
            }
        }
    }

    public function destroy($id){
        $movies = Movie::find($id);

        if($movies){
            $movies->delete();

            return new MoviesResource(true,'Data Successfully Deleted!','');
        }else{
            return response()->json([
                "message" => "Data Not Found!"
            ],422);
        }
}

}
