@props(['genres', 'movie'])

@php
    $runtime = explode(":", $movie->runtime);
@endphp

<x-layout title="Edit - {{$movie->title}}" header1="EDIT" :header2="$movie->title">
    <div class="lg:max-w-6xl md:max-w-3xl mx-auto px-2 md:px-4">
        <div class="w-full">
            <div class="max-w-lg mx-auto mb-4">
                <a href="{{route('movies.index')}}">
                    <div class="relative">
                        <div class="px-4 py-2 rounded-lg bg-white ring-1 ring-[#F33A2E] inline-block">
                            <-Back
                        </div>
                        <div class="flex absolute top-0 left-0 cursor-pointer hover:-top-1 hover:-left-1.5 duration-150 px-4 py-2 rounded-lg bg-white ring-1 ring-[#F33A2E] text-[#F33A2E] font-bold">
                            <-Back
                        </div>
                    </div>
                </a>
            </div>
            <form class="flex flex-col mx-auto max-w-lg bg-white p-4 gap-4 mb-4 border rounded-lg" method="post" action="/movies/{{$movie->id}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex flex-col">
                    <div class="grid grid-cols-3 w-full h-full">
                        <div></div>
                        <img class="w-full h-full object-cover" src="{{$movie->poster_path ? asset('storage/' . $movie->poster_path) : 'https://via.placeholder.com/238x354.png/232323?text=' . $movie->title}}" alt="{{$movie->title}}"/>
                        <div></div>
                    </div>
                    <label for="poster_path">
                        Poster
                    </label>
                    <input value="{{$movie->poster_path}}" class="bg-[#E4E6E9] outline-none px-4 py-2 rounded-md" type="file" id="poster_path" name="poster_path" />
                    @if ($errors->has('poster_path'))
                        <div class="text-red-600">{{ $errors->first('poster_path') }}</div>
                    @endif
                </div>
                <div class="flex flex-col">
                    <label for="title">
                        Title
                    </label>
                    <input value="{{$movie->title}}" class="bg-[#E4E6E9] outline-none px-4 py-2 rounded-md" type="text" id="title" name="title" placeholder="ex. Spider-Man: No Way Home" />
                    @if ($errors->has('title'))
                        <div class="text-red-600">{{ $errors->first('title') }}</div>
                    @endif
                </div>
                <div class="flex flex-col">
                    <p>Genres</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2">
                        @foreach ($genres as $genre)
                        <div class="flex items-center gap-2">
                            @if (str_contains($movie->genres, $genre->name))
                            <input type="checkbox" name="genres[]" value="{{$genre->name}}" checked>

                            @else

                            <input type="checkbox" name="genres[]" value="{{$genre->name}}">
                            @endif
                            <p>{{$genre->name}}</p>
                        </div>
                        @endforeach
                    </div>
                    @if ($errors->has('genres'))
                        <div class="text-red-600">{{ $errors->first('genres') }}</div>
                    @endif
                </div>
                <div class="flex flex-col">
                    <label for="studio">
                        Studio
                    </label>
                    <input value="{{$movie->studio}}" class="bg-[#E4E6E9] outline-none px-4 py-2 rounded-md" type="text" id="studio" name="studio" placeholder="ex. Lionsgate" />
                    @if ($errors->has('studio'))
                        <div class="text-red-600">{{ $errors->first('studio') }}</div>
                    @endif
                </div>
                <div class="flex flex-col">
                    <label>Runtime</label>
                    <div class="flex items-center gap-4">
                        <div>
                            <input value="{{$runtime[0]}}" placeholder="Hours" class="bg-[#E4E6E9] outline-none px-4 py-2 rounded-md" type="number" id="hours" name="hours" min="0" max="23">
                        </div>
                        <div>
                            <label for="minutes">Minutes</label>
                            <select class="bg-[#E4E6E9] outline-none px-4 py-2 rounded-md" id="minutes" name="minutes">
                                @for ($i = 0; $i < 60; $i++)
                                    @if ($runtime[1] == $i)
                                        <option selected value="{{$i}}">{{$i}}</option>
                                    @else
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endif
                                @endfor
                            </select>
                        </div>
                    </div>
                    @if ($errors->has('hours'))
                        <div class="text-red-600">{{ $errors->first('hours') }}</div>
                    @endif
                </div>
                <div class="flex flex-col">
                    <label for="director">
                        Director
                    </label>
                    <input value="{{$movie->director}}" class="bg-[#E4E6E9] outline-none px-4 py-2 rounded-md" type="text" id="director" name="director" placeholder="ex. John Doe" />
                    @if ($errors->has('director'))
                        <div class="text-red-600">{{ $errors->first('director') }}</div>
                    @endif
                </div>
                <div class="flex flex-col">
                    <label for="actor">
                        Actors
                    </label>
                    <input value="{{$movie->actor}}" class="bg-[#E4E6E9] outline-none px-4 py-2 rounded-md" type="text" id="actor" name="actor" placeholder="ex. Will Smith" />
                    @if ($errors->has('actor'))
                        <div class="text-red-600">{{ $errors->first('actor') }}</div>
                    @endif
                </div>
                <div class="flex flex-col">
                    <label for="released_date">
                        Released Date
                    </label>
                    <input value="{{$movie->released_date}}" class="bg-[#E4E6E9] outline-none px-4 py-2 rounded-md" type="date" id="released_date" name="released_date" />
                    @if ($errors->has('released_date'))
                        <div class="text-red-600">{{ $errors->first('released_date') }}</div>
                    @endif
                </div>
                <div class="flex flex-col">
                    <label for="description">
                        Overview
                    </label>
                    <textarea class="bg-[#E4E6E9] outline-none px-4 py-2 rounded-md h-24 leading-relaxed" id="description" name="description">
                        {{trim($movie->description)}}
                    </textarea>
                    @if ($errors->has('description'))
                        <div class="text-red-600">{{ $errors->first('description') }}</div>
                    @endif
                </div>
                <div class="flex justify-end items-center">
                    <div class="relative">
                        <div class="flex cursor-pointer gap-2 px-4 py-2 text-white ring-1 ring-inset ring-green-700 rounded-lg">
                            Update
                        </div>
                        <button type="submit" class="flex absolute top-0 left-0 cursor-pointer hover:-top-1 hover:-left-1.5 duration-150 gap-2 px-4 py-2 rounded-lg bg-green-700 text-white font-bold">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layout>
