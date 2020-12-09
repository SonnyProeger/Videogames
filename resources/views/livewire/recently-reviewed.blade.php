<div wire:init="loadRecentlyReviewed" class="recently-reviewed-container space-y-12 mt-8">
@forelse($recentlyReviewed as $reviewed)
    <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
        <div class="relative flex-none">
            <a href="#">
                <img src="{{\Illuminate\Support\Str::replaceFirst('thumb','cover_big',$reviewed['cover']['url'])}}" alt="game cover"
                     class="w-48 hover:opacity-75 transition ease-in-out duration:150">
            </a>
            <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full"
                 style="right:-20px; bottom:-20px;">
                @if (isset($reviewed['aggregated_rating']))
                    <div class="font-semibold text-xs flex justify-center items-center h-full">
                        {{round($reviewed['aggregated_rating']).'%'}}
                    </div>
                @endif
            </div>
        </div>
        <div class="ml-12">
            <a href="#" class="block text-lg font-semibold leading-tight hover:text-gray-400 mt-4">{{$reviewed['name']}}</a>
            <div class="text-gray-400 mt-1">
                @foreach($reviewed['platforms'] as $platform)
                    {{$platform['abbreviation']}},
                @endforeach
            </div>
            <div class="mt-6 text-gray-400 hidden lg:block">
                {{$reviewed['summary']}}
            </div>
        </div>
    </div>
    @empty
    @foreach(range(1,3) as $game)
        <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
            <div class="relative flex-none">
                <div class="bg-gray-700 w-32 lg:w-48 h-40 lg:h-56"></div>
            </div>
            <div class="ml-12">
                <a href="#" class="inline-block text-lg font-semibold leading-tight mt-4 text-transparent bg-gray-700 rounded">title goes here</a>
                <div class="mt-8 space-y-4 hidden lg:block">
                    <span class="text-transparent bg-gray-700 rounded inline-block">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur.</span>
                    <span class="text-transparent bg-gray-700 rounded inline-block">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur.</span>
                    <span class="text-transparent bg-gray-700 rounded inline-block">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur.</span>
                </div>
            </div>
        </div>
    @endforeach
    @endforelse

</div>
