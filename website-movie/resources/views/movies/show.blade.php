@props(['movie'])

@php
    $genres = explode(',', $movie->genres);
@endphp

<x-layout :title="$movie->title" :header2="$movie->title">
    <div class="lg:max-w-6xl md:max-w-3xl mx-auto px-2 md:px-4">

        <div class="w-full">
            <div class="max-w-2xl flex flex-col gap-4 mx-auto">
                 <a href="/">
                    <div class="relative">
                        <!-- <div class="hidden md:flex cursor-pointer gap-2 px-4 py-2 text-white ring-1 ring-inset ring-[#F33A2E] rounded-lg">
                            Reset
                        </div> -->
                        <div class="px-4 py-2 rounded-lg bg-white ring-1 ring-[#F33A2E] inline-block">
                            <-Back
                        </div>
                        <div class="flex absolute top-0 left-0 cursor-pointer hover:-top-1 hover:-left-1.5 duration-150 px-4 py-2 rounded-lg bg-white ring-1 ring-[#F33A2E] text-[#F33A2E] font-bold">
                            <-Back
                        </div>
                    </div>
                </a>
                <div class="gap-4 grid md:grid-cols-3 bg-white rounded-lg p-4 border">
                    <div class="w-full h-full">
                        <img class="w-full h-full object-cover" src="{{$movie->poster_path ? asset('storage/' . $movie->poster_path) : 'https://via.placeholder.com/238x354.png/232323?text=' . $movie->title}}" alt="{{$movie->title}}" />
                    </div>
                    <div class="flex flex-col gap-4 md:col-span-2">
                        <h4 class="text-lg text-[#232323] font-bold line-clamp-2">{{$movie->title}}</h4>
                        <div class="flex flex-wrap gap-2 items-center">
                            <p class="font-semibold">Genres:</p>
                            @foreach ($genres as $genre)
                            <a href="/?genre={{$genre}}">
                                <div class="text-white rounded-lg text-[.6rem] bg-gray-600 hover:bg-[#F33A2E] p-1 line-clamp-1">{{$genre}}</div>
                            </a>
                            @endforeach
                        </div>
                        <div class="flex flex-wrap gap-2 items-center">
                            <p class="font-semibold">Studio:</p>
                            <p>{{$movie->studio}}</p>
                        </div>
                        <div class="flex flex-wrap gap-2 items-center">
                            <p class="font-semibold">Runtime:</p>
                            <p>{{$movie->runtime}}</p>
                        </div>
                        <div class="flex flex-wrap gap-2 items-center">
                            <p class="font-semibold">Director:</p>
                            <p>{{$movie->director}}</p>
                        </div>
                        <div class="flex flex-wrap gap-2 items-center">
                            <p class="font-semibold">Actor:</p>
                            <p>{{$movie->actor}}</p>
                        </div>
                        <div class="flex flex-wrap gap-2 items-center">
                            <p class="font-semibold">Released Date:</p>
                            <p>{{$movie->released_date}}</p>
                        </div>
                    </div>
                </div>
                <div class="p-4 rounded-lg bg-white mb-4">
                    <h4 class="text-lg text-[#232323] font-bold mb-4">Overview</h4>
                    <p>
                        {{$movie->description}}
                    </p>
                </div>
            </div>

        </div>
    </div>
</x-layout>
