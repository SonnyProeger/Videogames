
<div wire:init="loadMostAnticipated" class="most-anticipated-container space-y-10 mt-8">
    @forelse($mostAnticipated as $anticipated)
        <div class="game flex">
            <a href="#">
                <img src="{{$anticipated['cover']['url']}}" alt="game cover" class="w-16 hover:opacity-75 transition ease-in-out duration:150">
            </a>

            <div class="ml-4">
                <a href="#" class="hover:text-gray-300">{{$anticipated['name']}}</a>
                <div class="text-gray-400 text-sm mt-1">
                    {{\Carbon\Carbon::parse($anticipated['first_release_date'])
                        ->format('M d, Y')}}
                </div>
            </div>

        </div>
    @empty
        @foreach(range(1,4) as $game)
            <div class="game flex">
                <div class="block w-16 h-20 bg-gray-700 flex-none">

                </div>
                <div class="ml-4">
                    <div class="inline-block bg-gray-700 text-transparent rounded leading-tight">title goes here today</div>
                    <div class="text-transparent bg-gray-700 rounded inline-block text-sm mt-2">
                        December 12, 2020
                    </div>
                </div>
            </div>
        @endforeach
    @endforelse
</div>
