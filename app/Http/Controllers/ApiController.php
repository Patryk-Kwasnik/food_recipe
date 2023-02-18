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
        $key?$this->key=$key:$this->key ='577b6c72e9msh6f5736b6a332ce3p188086jsne65be91856fe';
        $host?$this->host=$host:$this->host ='tasty.p.rapidapi.com';
        $this->httpHeaders = Http::withHeaders([
            'X-RapidAPI-Key' => $this->key,
            'X-RapidAPI-Host' => $this->host
        ]);
        session_start();
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
        if (!isset($_SESSION['recipes'][$id])) {
            try {
                $response = $this->httpHeaders->get('https://tasty.p.rapidapi.com/recipes/get-more-info', ['id' => $id]);
                $results = $response->json();
                $_SESSION['recipes'][$results['id']] = $results;
            } catch (Exception  $e) {
                echo 'Caught exception: ', $e->getMessage(), "\n";
            }
            //podobne
            try {
                $response = $this->httpHeaders->get('https://tasty.p.rapidapi.com/recipes/list-similarities', ['recipe_id' => $id]);
                $similarities = $response->json();

                $_SESSION['recipes'][$results['id']]['similarities'] = $similarities;
            } catch (Exception  $e) {
                echo 'Caught exception: ', $e->getMessage(), "\n";
            }
            return view('recipes.details', compact('results', 'similarities'));
        } else{
            $results =  $_SESSION['recipes'][$id];
            $similarities =  $_SESSION['recipes'][$id]['similarities'];

            return view('recipes.details', compact('results','similarities'));
        }
    }

}
