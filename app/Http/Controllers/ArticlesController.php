<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Articles\CreateArticleRequest;
use App\Http\Requests\Articles\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Support\Str;
use League\Flysystem\Adapter\NullAdapter;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
       public function  __construct()
{
    $this->middleware('auth')->except('show');
}

    public function index()
    {
        //
        $articles = Article::orderBy('created_at', 'Desc')->paginate(request('perPage', 5));
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('articles.create');
    }


    public function slug($string, $separator = '-') {
        if (is_null($string)) {
            return "";
        }

        $string = trim($string);

        $string = mb_strtolower($string, "UTF-8");;

        $string = preg_replace("/[^a-z0-9_\sءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", "", $string);

        $string = preg_replace("/[\s-]+/", " ", $string);

        $string = preg_replace("/[\s_]/", $separator, $string);

        return $string;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateArticleRequest $request)
    {
        //
        $input = $request->all();
        $file = $request->file('image');

        if ($request->hasFile('image')) {
            $name = preg_replace('/\s+/', '_', time() . '_' . $file->getClientOriginalName());
            $file->move('assets/Articles/img', $name);
            $input['image'] = $name;
        }
        $input['slug'] = $this->slug($request->title);
        Article::create($input);
        session()->flash('success', 'تم اضافة المقال بنجاح');

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
        // return view('blog', compact('article'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
        return view('articles.create', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        //
        $input = $request->all();
        $file = $request->file('image');

        if ($request->hasFile('image')){
            $name = preg_replace('/\s+/', '_', time() . '_' . $file->getClientOriginalName());
            $oldImage = 'assets/Articles/img/' . $article->image;
            if ($article->image != Null) {
                unlink($oldImage);
            }
            $file->move('assets/Articles/img', $name);
            $input['image'] = $name;
        }
        $input['slug'] = $this->slug($request->title);
        $article->update($input);
        session()->flash('success', 'تم تحديث المقال بنجاح');

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
        $oldImage = 'assets/Articles/img/' . $article->image;
        if (file_exists($oldImage)) {
            unlink($oldImage);
        }
        $article->delete();
        session()->flash('success', 'تم حذف المقال بنجاح');

        return redirect()->route('articles.index');
    }
}
