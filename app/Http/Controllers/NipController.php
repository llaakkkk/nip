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



class NipController extends Controller
{




    public function index()
    {


        return \View::make('main');

    }

    public function formGet()
    {

        $v = \Validator::make( \Request::all(), [
            'name' => 'inputNip',
            'inputNip' => 'required|max:10|min:10',

        ]);

        if ($v->fails())
        {
            $errors = $v->errors();
            $errors =  json_decode($errors);

            return response()->json([
                'success' => false,
                'message' => $errors
            ], 422);
        }

        else {
            $input = \Request::all();

            $nipNumber = $input['inputNip'];

            $firmName =  $this->checkInfo($nipNumber);

            if ($firmName != null){
                return response()->json([
                    'success' => true,
                    'message' => $firmName,
                ], 200);
            } else {
                return response()->json([
                    'success' => true,
                    'message' => 'firma, której nie ma',
                ], 200);
            }

        }

    }

    public function getKey()
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://wyszukiwarkaregon.stat.gov.pl/wsBIR/UslugaBIRzewnPubl.svc/ajaxEndpoint/Zaloguj",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\"pKluczUzytkownika\":\"aaaaaabbbbbcccccdddd\"}",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $key = json_decode($response, true , 512);
           return $key['d'];
        }
    }

    public function checkInfo($nipNumber){

        $key = $this->getKey();
//       var_dump($key);
        if (!empty($nipNumber)){

            $json = "{\n        \"pParametryWyszukiwania\": {\n            \"NazwaPodmiotu\": null,\n
                            \"AdsSymbolGminy\": null,\n            \"AdsSymbolMiejscowosci\": null,\n
                            \"AdsSymbolPowiatu\": null,\n            \"AdsSymbolUlicy\": null,\n
                             \"AdsSymbolWojewodztwa\": null,\n            \"Dzialalnosci\": null,\n
                             \"PrzewazajacePKD\": false,\n            \"Regon\": null,\n            \"Krs\": null,\n
                            \"Nip\": \"".$nipNumber."\",\n            \"Regony9zn\": null,\n            \"Regony14zn\": null,\n
                            \"Krsy\": null,\n            \"Nipy\": null,\n            \"NumerwRejestrzeLubEwidencji\": null,\n
                         \"OrganRejestrowy\": null,\n            \"RodzajRejestru\": null,\n
                           \"FormaPrawna\": null\n        },\n
                          \"jestWojPowGmn\": true\n    }";
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://wyszukiwarkaregon.stat.gov.pl/wsBIR/UslugaBIRzewnPubl.svc/ajaxEndpoint/daneSzukaj",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $json,
                CURLOPT_HTTPHEADER => array(
                    "content-type: application/json",
                    "cache-control: no-cache",
                    "sid :".$key,


                ),
            ));

            $response = curl_exec($curl);

            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                $nipParse = json_decode($response, true , 512);

            if (empty($nipParse['d'])){
                return null;
            }
            else {

                $firmNameParse = json_decode($nipParse['d'], true , 512);
                $firmName = $firmNameParse[0]['Nazwa'];

                return $firmName;

            }

            }
        }

    }



}