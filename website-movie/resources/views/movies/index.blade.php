<x-toast />
<x-layout title="Favorite Movies" header1="LIST OF MY" header2="FAVORITE MOVIES">
    <div class="lg:max-w-6xl md:max-w-3xl mx-auto px-2 md:px-4">
        <!-- buttons container -->
        <div class="flex w-full justify-between gap-4 mb-4">

            <!-- tools container -->
            <div class="flex flex-col flex-grow md:flex-row justify-between gap-4">
                <!-- buttons -->
                <a href="{{route('movies.index')}}">
                    <x-secondary-button>
                        Reset
                    </x-secondary-button>
                </a>

                <!-- search -->

                <form method="get" class="flex flex-grow justify-between">
                    <input type="text" placeholder="Search title, actor, genre, etc." name="search" class= "flex flex-grow px-2 py-1 md:px-4 md:py-2 rounded-l-lg outline-none ring-1 ring-[#F33A2E]" >
                    <button type="submit">
                        <div class="relative">
                            <div class="flex cursor-pointer gap-2 px-2 py-1 md:px-4 md:py-2 text-[#F33A2E] ring-1 bg-white ring-[#F33A2E] hover:text-white hover:bg-[#F33A2E] duration-300 rounded-r-lg">
                                Search
                            </div>
                        </div>
                    </button>
                </form>

            </div>

            <!-- Add button -->
            <a href="{{route('movies.create')}}">
                <x-primary-button>
                    Add
                </x-primary-button>
            </a>
        </div>
        @if (count($movies) === 0)
        <div class="text-center my-60">
            <h2 class="text-3xl text-[#232323] font-semibold">No movies found...</h2>
        </div>
        @else
        <!-- card container -->
        <div class="grid gap-4 grid-cols-3 md:grid-cols-4 lg:grid-cols-6 mb-4">
            <!-- cards -->
            @foreach($movies as $movie)
                <x-movie-card :movie="$movie" />
            @endforeach
        </div>
        <div class="mb-24">
            {{$movies->links()}}
        </div>


        @endif
    </div>
</x-layout>
