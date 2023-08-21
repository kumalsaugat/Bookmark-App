<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Bookmark;

class BookmarkController extends Controller
{
    public function index()
    {
        $bookmarks = Bookmark::query()->where('user_id',Auth::user()->id )->get();
        return Inertia::render('Bookmark/List/Index',[
            'bookmarks' => $bookmarks,
        ]);

    }
}