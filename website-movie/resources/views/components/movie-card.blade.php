@props(['movie'])

@php
    $genres = explode(",", $movie->genres);
@endphp

<div class="flex flex-col gap-1 hover:text-[#F33A2E] cursor-pointer">

    <div class="relative h-full w-full">
        <div class="absolute flex flex-col gap-2 justify-center md:justify-start top-0 left-0 rounded-lg w-full h-full hover:bg-[#00000099] duration-300 text-transparent hover:text-white">

            <a href="movies/{{$movie->id}}" class="md:rounded-t-lg flex justify-center hover:bg-green-500">
                <button class="px-4 py-1 md:py-3">View</button>
            </a>
            <a href="movies/{{$movie->id}}/edit" class="bg-transparent hover:bg-blue-500 flex justify-center
            ">
                <button class="px-4 py-1 md:py-3">Edit</button>
            </a>
            <form method="POST" action="/movies/{{$movie->id}}" class="flex justify-center px-4 py-1 md:py-3 bg-transparent hover:bg-red-900">
                @csrf
                @method("DELETE")
                <button>Delete</button>
            </form>

        </div>
        <img class="h-full w-full object-cover rounded-lg" src="{{$movie->poster_path ? asset('storage/' . $movie->poster_path) : 'https://via.placeholder.com/238x354.png/232323?text=' . $movie->title}}" alt="{{$movie->title}}" />
        <div class="hidden absolute bottom-0 p-1 w-full md:flex flex-wrap gap-2 text-white bg-[#FDEFEE90]">
            @foreach ($genres as $genre)
                <a href="/?genre={{$genre}}">
                    <div class="rounded-lg text-[.6rem] bg-gray-600 hover:bg-[#F33A2E] p-1 line-clamp-1">{{$genre}}</div>
                </a>
            @endforeach
        </div>
    </div>
    <h4 class="font-bold text-lg line-clamp-1">{{$movie->title}}</h4>
</div>
