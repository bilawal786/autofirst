<?php

namespace App\Http\Controllers\Admin;

use App\Content;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index(){
        $content = Content::find(1);
        return view('admin.content.index', compact('content'));
    }
}
