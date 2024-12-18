<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Workshop;
use App\Models\Project;
use App\Models\Internship;
use App\Models\Program;
use App\Models\Fablab;
use Illuminate\Support\Str;
class NewsController extends Controller
{
    /*public function displayNews(Request $request)
    {
        $news = News::paginate(3);

        if ($request->ajax()) {
            return view('front.news.news', compact('news'));
        }

        return view('front.news.news', ['news' => $news]);
    }*/
    
    public function displayNews(Request $request)
{
    $latestWorkshops = Workshop::orderBy('updated_at', 'desc')->take(2)->get();
    $latestPrograms = Program::orderBy('updated_at', 'desc')->take(3)->get();
    $latestFablabs = Fablab::orderBy('updated_at', 'desc')->take(3)->get();
    $latestProjects = Project::orderBy('updated_at', 'desc')->take(3)->get();
    $latestInternships = Internship::orderBy('updated_at', 'desc')->take(3)->get();
    // You can add more categories as needed

    

    if ($request->ajax()) {
        return view('front.news.news', compact('latestWorkshops', 'latestPrograms', 'latestFablabs', 'latestProjects','latestInternships'));
    }

    return view('front.news.news', compact('latestWorkshops', 'latestPrograms', 'latestFablabs', 'latestProjects','latestInternships'));
}

    /*public function index()
    {
        $news = News::orderBy('updated_at', 'desc')->take(3)->get();

        return view('front.index', ['news' => $news]);
    }*/
   public function index()
{
    $workshops = Workshop::orderBy('updated_at', 'desc')->take(3)->get();
    $projects = Project::orderBy('updated_at', 'desc')->take(3)->get();
    $internships = Internship::orderBy('updated_at', 'desc')->take(3)->get();
    $programs = Program::orderBy('updated_at', 'desc')->take(3)->get();
    $fablabs = Fablab::orderBy('updated_at', 'desc')->take(3)->get();

    // Combine all the records into a single collection
    $allRecords = $workshops->concat($projects)->concat($internships)->concat($programs)->concat($fablabs);

    // Sort the combined collection by updated_at in descending order
    $latestRecords = $allRecords->sortByDesc('updated_at')->take(3);

    return view('front.index', ['latestRecords' => $latestRecords]);
}



   /* public function showNews(News $news)
    {
        return view('front.news.showNews', ['news' => $news]);
    }*/
    
    public function showNews($slug)
{
    // Determine the type of news item based on the slug
    $workshop = Workshop::where('slug', $slug)->first();
    $project = Project::where('slug', $slug)->first();
    $internship = Internship::where('slug', $slug)->first();
    $program = Program::where('slug', $slug)->first();
    $fablab = Fablab::where('slug', $slug)->first();

    // Determine the type and retrieve the corresponding news item
    $news = $workshop ?? $project ?? $internship ?? $program ?? $fablab;

    // If no matching news item is found, you may want to handle it accordingly
    if (!$news) {
        abort(404); // or handle differently based on your requirements
    }

    // Determine the type to pass to the view
    $type = get_class($news);

    return view('front.news.showNews', ['news' => $news, 'type' => $type]);
}

public function showFiltredNews(Request $request)
{
    $category = $request->get('category');

    $workshops = [];
    $internships = [];
    $programs = [];
    $fablabs = [];
    $projects = [];

    if ($category) {
        switch ($category) {
            case 'workshops':
                $workshops = Workshop::all();
                break;
            case 'internships':
                $internships = Internship::all();
                break;
            case 'programs':
                $programs = Program::all();
                break;
            case 'fablabs':
              $fablabs = Fablab::all();
              break;
            case 'projects':
              $projects = Project::all();
              break;
            default:
              break;
        }
    }

    // Return the view with the filtered results
    return view('front.news.news', compact('workshops', 'internships', 'programs', 'fablabs', 'projects'));
}


}
