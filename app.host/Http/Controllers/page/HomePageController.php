<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use App\Models\Metadata;
use App\Models\Project;
use App\Models\Section;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    protected const PAGE_ID = 1;

    public function index()
    {
        $sections = Section::where('page_id', self::PAGE_ID)->get();
        $metadata = Metadata::where('page_id', self::PAGE_ID)->get();
        $projects = Project::with('projectImages')->limit(4)->get();
        echo $projects[0]["project_images"];
        return view('home', compact(
            'sections',
            'metadata',
            'projects'
        ));
    }
}
