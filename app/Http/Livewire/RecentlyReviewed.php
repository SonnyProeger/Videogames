<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class RecentlyReviewed extends Component
{
    public $recentlyReviewed = [];

    public function loadRecentlyReviewed(){
        $this->recentlyReviewed = Cache::remember('recently-reviewed', 7, function (){
            $before = Carbon::now()->subMonths(2)->timestamp;
            $current = Carbon::now()->timestamp;

            return Http::withHeaders(config('services.igdb'))
                ->withBody(
                    'fields name, cover.url, first_release_date, platforms.abbreviation, aggregated_rating, aggregated_rating_count, slug, summary;
                            where platforms = (48,49,130,6)
                            & (first_release_date >=' . $before . '
                            & first_release_date <' . $current . '
                            & aggregated_rating_count > 5
                            );
                            sort aggregated_rating desc;
                            limit 3;',
                                    'text/plain'
                                )
                ->post('https://api.igdb.com/v4/games')->json();
        });

    }
    public function render()
    {
        return view('livewire.recently-reviewed');
    }
}
