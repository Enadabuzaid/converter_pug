<?php

namespace App\Http\Controllers;

use http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GeneratePugReportController extends Controller
{
    public function index()
    {
//        $client = new \http\Controllerlient();
        $data = Http::get('https://test-converter.enad-abuzaid.com/index.json');

        $pug_array_result = [];
        $tag_has_child = 0;
        $counter = 0;
        $parent_index = 0;


        $dom = new \DOMDocument();
        $dom->loadHTML($data['html']);
        foreach ($dom->getElementsByTagName('*') as $element) {
            $counter ++;
            $tag_class = '';
            $tag_id = '';





            if ($element->hasAttributes()) {
                foreach ($element->attributes as $attr) {
                    $att_name = $attr->nodeName;
                    $att_value = $attr->nodeValue;

                    if ($att_name == 'class'){
                        $tag_class = $att_value;
                    }

                    if ($att_name == 'id'){
                        $tag_id = $att_value;
                    }
                }
            }

            $tag_name = $element->nodeName;
            $text_tag = $element->textContent;
            if ($tag_name == 'html' || $tag_name == 'body' || $tag_name == 'head')
            {
                $text_tag = '';
            }
            $result = [
                'tag_name' => $tag_name,
                'text_tag' => $text_tag,
                'has_class' => $tag_class,
                'has_id' => $tag_id,
            ];


//            if ($tag_has_child > 0 )
//            {
//                $parent_index = count($pug_array_result) -1 ;
//                array_push($pug_array_result[$parent_index] , $result);
//                $tag_has_child=$tag_has_child-1;
//
//            } else {
//                array_push($pug_array_result , $result);
//                $tag_has_child = $element->childElementCount;
//
//
//            }





            array_push($pug_array_result , $result);

        }



        return $pug_array_result;
    }
}
