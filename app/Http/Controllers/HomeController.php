<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $page = $request->query('page', 1);

        $breweries = $this->getBreweries($page);

        return view('home',["breweries" => $breweries]);
    }

    public function getBreweries($page){
        $client = new \GuzzleHttp\Client();
        $response = $client->get('https://api.openbrewerydb.org/v1/breweries', [

        ]);
        $breweries = json_decode($response->getBody(), true);
        return $this->paginate($breweries, 10,$page,["path" => route("home")]);
    }

    public function paginate($items, $perPage = 20, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
