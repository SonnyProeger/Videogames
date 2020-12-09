<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
        public function index()
    {
        return view('index', [
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param string $slug
     * @return Application|Factory|View|Response
     */
    public function show($slug)
    {
        $game = Http::withHeaders(config('services.igdb'))
            ->withBody(
                "fields name, cover, cover.url, first_release_date, platforms.abbreviation, rating, involved_companies.company.name,
                 genres.name, aggregated_rating, summary, websites.*, videos.*, screenshots.*, similar_games.platforms.*, similar_games.platforms.abbreviation,
                 similar_games.slug, similar_games.name, similar_games.cover.url, similar_games.cover, similar_games.rating, slug, storyline;
                    where slug = \"$slug\";
                    );
                    ",
                'text/plain'
            )
            ->post('https://api.igdb.com/v4/games')->json();

        dump($game);

        abort_if(!$game,404);

        return view('show',[
            'game' => $game[0],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
