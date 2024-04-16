<?php

namespace App\Http\Middleware\Web;

use App\Models\Blog\Category;
use App\Models\Setting;
use App\Models\SocialMedia;
use App\Models\Menu;
use App\Models\Submenu;
use App\Models\Page;
use App\Models\Blog\Tag;
use App\Models\Product\CategoryProduct;
use Closure;

class ShareVariable
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $categoryArticles   = Category::all();
        $setting            = Setting::whereIn('key', ['name', 'email', 'phone', 'whatsapp', 'address', 'gmaps', 'logo', 'logo_gray', 'icon', 'ogimage', 'pixel', 'analytics', 'file'])->get();
        $SocialMedia        = SocialMedia::all();
        $tag    = Tag::all();

        // $about              = Setting::key(Setting::ABOUT)->locale('id')->first()->json_value;

        view()->share(compact('categoryArticles'));
        view()->share(compact('setting'));
        view()->share(compact('SocialMedia'));
        view()->share(compact('tag'));
        // view()->share(compact('about'));

        return $next($request);
    }
}
