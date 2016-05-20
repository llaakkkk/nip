<?php

namespace App\Http\Controllers;

use App\Jobs\ConverterJob;
use Illuminate\Http\Request;
use Illuminate\Foundation;
//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Controllers\Controller;
use Orchestra\Parser\Xml\Reader;
use Orchestra\Parser\Xml\Document;


//use Illuminate\Support\Facades\Request;



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

    public function formGet()
    {


        $v = \Validator::make( \Request::all(), [
            'inputNip' => 'required|max:10',

        ]);

        if ($v->fails())
        {
            return redirect()->back()->with('message', 'all fields are required');
        }
        else{
            $input = \Request::all();

            $convert['user_value'] = $input['inputUser'];


            return \Redirect::route('/result/cool')->with('convert', $convert);
        }

    }

    public function convertResult()
    {
        $converts = \Session::get('convert');

//            dd($converts);
        return \View::make('convert')->with([
            'user_value' => $converts['user_value'],
            'sum' => $converts['sum'],
            'first_rate' => $converts['first_value'][0],
            'first_currency' => $converts['first_value'][1],
            'second_rate' => $converts['second_value'][0],
            'second_currency' => $converts['second_value'][1],
        ]);

    }

}