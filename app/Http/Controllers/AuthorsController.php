<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    /**
     * Store authors
     */
    public function store()
    {
        Author::create(request()->only([
            'name', 'dob'
        ]));
    }
}
