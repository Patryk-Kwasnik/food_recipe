<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
class ApiController extends Controller
{
    private string $key;
    private string $host;
    private $httpHeaders;
    protected $client;
    protected $request;

    public function __construct($key=null, $host=null)
    {
        $key?$this->key=$key:$this->key ='f0a873dce1mshf5c091d8ba87cc6p181c38jsn8c30914a55d0';
        $host?$this->host=$host:$this->host ='tasty.p.rapidapi.com';
        $this->httpHeaders = Http::withHeaders([
            'X-RapidAPI-Key' => $this->key,
            'X-RapidAPI-Host' => $this->host
        ]);
    }
    //pobranie przepisów - homepage
    public function getRecipes($limit=null, $offset=null)
    {
        try{
            $response = $this->httpHeaders->get('https://tasty.p.rapidapi.com/recipes/list',
            [
                'from' => $offset??'0',
                'size' => $limit??'20',
                'tags' => 'under_30_minutes'
            ]);
            $results = $response->json()['results'];

            return view('index',compact('results'));
        }catch(Exception  $e){
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
    //szególy - karta przepisu
    public function detailsById($id)
    {
        try{
            $response = $this->httpHeaders->get('https://tasty.p.rapidapi.com/recipes/get-more-info', ['id' => $id]);
            $results = $response->json();

            return view('recipes.details',compact('results'));
        }catch(Exception  $e){
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

}
