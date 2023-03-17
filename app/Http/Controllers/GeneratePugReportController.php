<?php

namespace App\Http\Controllers;

use Pug\Pug;

class GeneratePugReportController extends Controller
{
    public function index()
    {
//        $api = Http::get('https://test-converter.enad-abuzaid.com/index.json');

        // Sample JSON data
        $jsonData = '{
            "file_name": "test",
            "date": "2023-03-16T18:42:18.305190Z",
            "html": "<div><p>this p for section </p><h4>this h4 child for section parent</h4></div><p>hello this is sample text</p><div><p class=\'test\'>hi with class and child</p></div><p>another paragraph</p><h1> heading 1</h1><h2 id=\'IDTest\'>heading 2</h2><h3>heading 3</h3><span>this is span</span><div>this is div</div><img src=\'test.png\' alt=\'alt tag\'>"
        }';

        $data = json_decode($jsonData, true);

        // Extract HTML code from data
        $html = $data['html'];



        $pug = new Pug();



        $pugTemplate = $pug->compile($html);


        $fileName = $data['file_name'] . '.pug';




        return response($pugTemplate, 200, [
            'Content-Type' => 'application/octet-stream',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"'
        ]);
    }
}
