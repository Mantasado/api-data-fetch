<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DataController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Data::All();

        return view('data', ['data' => $data]);
    }

    public function storeApiData()
    {
        $latestDate = $this->latestImportDate();

        if($latestDate === null)
        {
            $latestDate = '2021-03-01';
        }

        $data = $this->mergeArrays($latestDate);

        foreach ($data as $array) {
            Data::create($array);          
        }

        return redirect()->back();
    }

    public function latestImportDate()
    {
        $latest = Data::latest('import_date')->get()->first();

        if($latest)
        {
            return $latest['import_date'];
        }
        return null;
    }

    protected function mergeArrays($latestDate)
    {
        $data = array();
        $collection = $this->fetchApiData($latestDate);
        $pages = $collection['pages'];

        for ($i=1; $i <= $pages; $i++) {
            $fetchApiData = $this->fetchApiData($latestDate, $i); 
            $data = array_merge($data, $fetchApiData['data']);
        }

        return $data;
    }

    protected function fetchApiData($latestDate, $currentPage = 1)
    {
        $link ='http://159.65.123.24/data/export/';
        $url = $link . $latestDate . '/' . $currentPage;

        $response = Http::get($url, [
            'api-key' => env('API_KEY'),
        ]);

        if($response->successful())
        {
            return $response->collect();
        }

        return $response->failed();
    }
}
