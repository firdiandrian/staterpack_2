<?php

namespace App\Http\Controllers\Website\Contact;

use App\Models\Inbox;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
// use App\Rules\ReCaptcha;

class ContactController extends Controller
{
    /**
     * @var Inbox $inbox
     */
    protected $inbox;

    /**
     * ImageController constructor.
     */
    public function __construct()
    {
        View()->share('menu', 'Text Us');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['kontak'] = Slider::all();
        return view('website.contact.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        $this->inbox = new Inbox();
        $request->validate([
            // 'g-recaptcha-response' => ['required', new ReCaptcha],
            'email' => 'required|email'
        ]);

        if ($this->inbox->create($request->all())) {
            return redirect()->route('contact.index')->with(['status' => 'success', 'message' => 'Pesan Anda Sudah Terkirim']);
        }
        return redirect()->route('contact.index')->with(['status' => 'danger', 'message' => 'Gagal, Coba lagi nanti']);
    }


    public function subscribe(Request $request)
    {

        $this->subscribe = new Subscribe();
        $request->validate([
            // 'g-recaptcha-response' => ['required', new ReCaptcha],
            'email' => 'required|email'
        ]);

        if ($this->subscribe->create($request->all())) {
            return redirect()->route('article.index')->with(['status' => 'success', 'message' => 'Email Anda Sudah Terkirim']);
        }
        return redirect()->route('article.index')->with(['status' => 'danger', 'message' => 'Gagal, Coba lagi nanti']);
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
