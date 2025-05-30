<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use App\Models\Metadata;
use App\Models\Project;
use App\Models\Section;
use Illuminate\Http\Request;

class ProjectsPageController extends Controller
{
    protected const PAGE_ID = 3;

    public function index()
    {
        $sections = Section::where('page_id', self::PAGE_ID)->get();
        $metadata = Metadata::where('page_id', self::PAGE_ID)->get();
        $projects = Project::with(['projectImages', 'thumbnail'])->get();
        return view('projects', compact(
            'sections',
            'metadata',
            'projects'
        ));
    }
}
