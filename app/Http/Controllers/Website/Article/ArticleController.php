<?php

namespace App\Http\Controllers\Website\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog\Category;
use App\Models\Blog\Post;
use Illuminate\Support\Facades\View;
use App\Models\Blog\Tag;
use App\Models\Blog\BlogPostTag;

class ArticleController extends Controller
{
    public function __construct()
    {
        View::share('recentPosts', Post::latest()->limit(3)->get());
        View()->share('menu', 'Blog');
    }

    /**
     * Display a listing of the resource.
     *
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $article = Post::orderBy('id', 'desc')->paginate(3);
    $tags = Tag::all(); // Ambil semua tag dari tabel Tag

    return view('website.article.index', compact('article', 'tags'));
}

    public function category($slug)
    {
        $data['kategori']   = Category::where('slug', $slug)->first();
        $data['tags']     =Tag::all();
        $data['article']    = Post::where('blog_category_id', $data['kategori']->id)->paginate(8);
        return view('website.article.index', $data);
    }

        public function tag($slug)
        {
            $data['tags']   = Tag::where('slug', $slug)->first();
            $data['article']    = Post::where('blog_category_id', $data['tags']->id)->paginate(8);
            return view('website.article.index', $data);
        }
    
    
    public function search(Request $request)
    {
        $data['kategori']   = '"%$request->cari%"';
        $data['article']    = Post::where('slug', 'like', "%$request->cari%")->latest()->paginate(10);
        return view('website.article.index', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */


     public function filterByTag($tag)
{
    $article = Post::whereHas('tags', function ($query) use ($tag) {
        $query->where('name', $tag);
    })->orderBy('id', 'desc')->paginate(10);

    // You might also want to pass the tags to be displayed in the view
    $tags = Tag::all();

    return view('website.article.index', compact('article', 'tags'));
}



    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        // Increment view count
        $post->increment('count_view');

        $data['tag_show'] = Tag::all();
        $data['model'] = $post;
        return view('website.article.show', $data);
    }


    public function like($postId)
    {
        $post = Post::findOrFail($postId);
    
        // Increment like count
        $post->increment('count_like');
    
        return response()->json(['message' => 'Like count incremented successfully']);
    }
    /**
     * Handle share action.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $postId
     * @return \Illuminate\Http\Response
     */
    public function share(Request $request, $postId)
{
    $post = Post::findOrFail($postId);

    // Increment share count
    $post->increment('count_share');

    // Simpan perubahan ke database
    $post->save();

    return response()->json(['message' => 'Share count incremented successfully']);
}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
