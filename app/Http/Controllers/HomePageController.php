<?php

namespace App\Http\Controllers;

use App\Models\Metadata;
use App\Models\Section;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    protected const PAGE_ID = 1;

    public function index()
    {
        $sections = Section::where('page_id', self::PAGE_ID)->get();
        $metadata = Metadata::where('page_id', self::PAGE_ID)->get();
        return view('home', compact(
            'sections',
            'metadata'
        ));
    }
}
