<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $title = 'Welcome to Laravel';
        $param = "param i";
        return view('page.index', compact('title', 'param'));
    }

    public function about()
    {
        $title = 'Welcome to about page';
        $param = 'param 2';
        // return view('page.about')->with('title', $title);

        $N = -259;
        $number_array = array_map('intval', str_split($N));
        var_dump($number_array);
        foreach ($number_array as $index => $key) {
            if ($N > 0) {
                if ($key < 5) {
                    array_splice($number_array, $index, 0, 5);
                    break;
                }
            } else {
                if ($key > 5) {
                    array_splice($number_array, $index, 0, 5);
                    break;
                }
            }
        }
        $number =  (int) implode('', $number_array);
        if ($N < 0) {
            $number = -1 * $number;
        }
        echo $number;
        return view('page.about')->with('title', $number);
    }

    public function services()
    {
        $data = array(
            'title' => 'Welcome to services page',
            'param' => 'Param 4',
            'services' => ['Web design', 'SEO', 'Programming']
        );
        return view('page.services')->with($data);
    }
}
