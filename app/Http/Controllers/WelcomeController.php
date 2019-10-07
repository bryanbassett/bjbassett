<?php

namespace App\Http\Controllers;

use App\ShortLink;
use Illuminate\Http\Request;
use App\Cats;
use App\Item;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Illuminate\Support\Facades\URL as URL;
class WelcomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $section1 = Cats::___scopeAllInSection(1);
        $section2 = Cats::___scopeAllInSection(2);
        $section3 = Cats::___scopeAllInSection(3);


        return view('welcome',compact('section1','section2','section3'));
    }
    public function makePDF()
    {
       // $css = '<link href="/public/css/app.css" rel="stylesheet" type="text/css" />';
       // $client = new \GuzzleHttp\Client();
      //  $res = $client->get(URL::to('/'),['verify' => false]);
      //  $content = (string) $res->getBody();
      //  $content = $css.$content;
      //  $pdf = PDF::loadHTML($content);
     //   $snappy = new SNAP('/vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64');
    //    $snappy->setOption('cache-dir', '/public');
        $pdf = PDF::loadFile(URL::to('/').'?pdf=true')->setOption('viewport-size', '1920x768')->setOptions(['page-height' => '1650px', 'page-width' => '1275px'])->download('github.pdf');
        return $pdf;
        //header('Content-Type: application/pdf');
       // header('Content-Disposition: attachment; filename="file.pdf"');
       // echo  $snappy->getOutput('/');
      //  return $pdf->download('BryanBassett_Resume.pdf');
    }
}
