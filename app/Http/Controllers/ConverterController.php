<?php

namespace App\Http\Controllers;

use App\Jobs\ConverterJob;
use App\Jobs\TestJob;
use App\Test;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Orchestra\Parser\Xml\Reader;
use Orchestra\Parser\Xml\Document;


class ConverterController extends Controller
{

    protected $cubes;
    protected $converter;

    public function __construct()
    {
        $xml =  \XmlParser::load('http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml');

        $this->cubes = $xml->parse([
            'cube' => ['uses' => 'Cube.Cube.Cube[::currency,::rate]'],
        ]);

        $array = [];
        foreach ($this->cubes as $key => $value){
              foreach ($value as $k=>$v){

                  $array[] = [$v['::currency'] =>  $v['::rate']];

              }
        }
        $this->converter = $array;
    }


    public function index()
    {

        $currencies = $this->converter;

        return \View::make('main')->with('currencies', $currencies);

//        Test::all();
    }

    public function formGet($post)
    {
        var_dump($post);
        die();
    }

}