<?php

namespace App\Http\Controllers\Admin\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog\Tag;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:blog tags read');
        $this->middleware('permission:blog tags create')->only('create', 'store');
        $this->middleware('permission:blog tags update')->only('edit', 'update');
        $this->middleware('permission:blog tags delete')->only('destroy');

        view()->share('menuActive', 'blog');
        view()->share('subMenuActive', 'blog-tags');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        if ($request->has('tag') != "") {
            $data['models'] = tag::where('name', 'like', $request->get('tag'))->paginate(5);
        } else {
            $data['models'] = Tag::orderBy('id', 'desc')->paginate(10);
        }
        return view('admin.blog.tags.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:200',
            'description' => 'required',
        ]);

        $tag = new Tag($request->all());
        $tag->save();

        return redirect()
            ->route('admin.blog.tags.index')
            ->with([
                'message' => 'Save Successfully'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.blog.tags.edit', ['model' => $tag]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|max:200',
            'description' => 'required',
        ]);

        if ($tag->update($request->all())) {
            return redirect()->route('admin.blog.tags.index')->with(['status' => 'success', 'message' => 'Update Successfully']);
        }

        return redirect()->route('admin.blog.tags.edit', $tag->id)->with(['status' => 'danger', 'message' => 'Update Failed, Contact Developer']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Tag $tag
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Tag $tag)
    {
        if ($tag->delete()) {
            return redirect()->route('admin.blog.tags.index')->with(['status' => 'success', 'message' => 'Delete Successfully']);
        }
        return redirect()->route('admin.blog.tags.index')->with(['status' => 'danger', 'message' => 'Delete Failed, Contact Developer']);
    }
}
