<?php

namespace App\Http\Controllers;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

use Illuminate\Support\Facades\Validator;


class PagesController extends Controller
{
    public function HomePage()
    {
        $models = scandir(public_path()."/models");
        return view('pages.homepage');
    }
}
