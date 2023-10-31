<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | Comments',
            'head'          => 'Comments',
            'breadcumb1'    => 'Comments',
            'breadcumb2'    => 'Index'
        ];
        return view('adminpanel.pages.comment.index', $data);
    }
    public function detail(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | Comments',
            'head'          => 'Comments',
            'breadcumb1'    => 'Comments',
            'breadcumb2'    => 'Detail'
        ];
        return view('adminpanel.pages.comment.detail', $data);
    }
}
