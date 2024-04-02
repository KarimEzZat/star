<?php

namespace App\Http\Controllers;

use App\Company;
use App\Models\Article;
use App\Models\Faq;
use App\Models\Question;
use App\Models\Service;
use App\Models\Content;

class WelcomeController extends Controller
{
    //
    public function index()
    {
        return view('site')->with(['contents' => Content::all(), 'companies' => Company::all(),'services' => Service::latest()->get(),'faqs' => Faq::latest()->get(), 'questions' => Question::latest()->get(), 'articles' => Article::latest()->SimplePaginate(30)]);
    }
}
