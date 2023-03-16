<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestApiController extends Controller
{
    public function index()
    {

//        $html = "<!DOCTYPE html><html><head><title>Page Title</title></head><body><h1>My First Heading</h1><p>My first paragraph.</p></body></html>";
        $html_content="<p>hello this is sample text</p>";
        $html_content .="<p>another paragraph</p>";
        $html_content .="<h1> heading 1</h1>";
        $html_content .="<h2>heading 2</h2>";
        $html_content .="<h3>heading 3</h3>";
        $html_content .="<span>this is span</span>";
        $html_content .="<div>this is div</div>";
        $html_content .="<img src='test.png' alt='alt tag'>";




        $response = [
          'file_name' => 'test',
          'date' => now(),
          'html' => $html_content,

        ];

        return response()->json($response);
//        return json_encode($response);
    }
}
