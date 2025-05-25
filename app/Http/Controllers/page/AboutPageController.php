<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use App\Models\Metadata;
use App\Models\Section;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    protected const PAGE_ID = 2;

    public function index()
    {
        $sections = Section::where('page_id', self::PAGE_ID)->get();
        $metadata = Metadata::where('page_id', self::PAGE_ID)->get();
        return view('about', compact(
            'sections',
            'metadata'
        ));
    }
}
