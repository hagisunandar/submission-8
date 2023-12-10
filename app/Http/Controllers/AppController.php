<?php

namespace App\Http\Controllers;

use App\Models\laravel_1;
use Illuminate\Http\Request;
use App\Models\Guestbook;
use Illuminate\Support\Facades\App;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get posts
        $posts = Guestbook::all();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Guestbook::make($request->all(),[
            'nama' => 'request',
            'alamat' => 'request',
            'email' => 'request',
            'nomor_wa' => 'request',
        ]);

        // if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['nama']     = $request->nama;
        $data['alamat'] = $request->alamat;
        $data['email'] = $request->email;
        $data['nomor_wa'] = $request->nomor_wa;

        Guestbook::create($data);

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
