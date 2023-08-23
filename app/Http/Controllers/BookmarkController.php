<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Bookmark;
// use shweshi\OpenGraph\OpenGraph;

class BookmarkController extends Controller
{
    public function index()
    {
        $bookmarks = Bookmark::query()->where('user_id',Auth::user()->id )->get();
        return Inertia::render('Bookmark/List/Index',[
            'bookmarks' => $bookmarks,
        ]);

    }
    public function add()
    {
        return Inertia::render('Bookmark/Add/index',[

        ]);
    }




    public function getPreviewData(Request $request)
    {
        $postData = $this->validate($request,[
            'link' => ['required'],
        ]);
        $data = \OpenGraph::fetch( $postData['link']);
        return $data;
    }
}
