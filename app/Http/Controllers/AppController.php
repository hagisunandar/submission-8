<?php

namespace App\Http\Controllers;

use App\Models\laravel_1;
use Illuminate\Http\Request;
use App\Models\Guestbook;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;


class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get data dari model
        $posts = guestbook::all();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'alamat' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'nomor_wa' => 'required|string|max:255'
        ]);

        Guestbook::create([
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'email' => $request->input('email'),
            'nomor_wa' => $request->input('nomor_wa')
        ]);

        return redirect()->route('posts.index')->with('success', 'Data diri telah diInput.');
    }

    /**
     * Display the specified resource.
     */
    public function search(Request $request)
    {
        if($request->has('search')); {
        $posts = guestbook::where('nama', 'like','%'.$request->search.'%')->get();
        }

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $posts = guestbook::find($id);

        return view('posts.edit', compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'alamat' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'nomor_wa' => 'required|string|max:255'
        ]);

        $posts = guestbook::find($id);

        $posts->nama = $request->input('nama');
        $posts->alamat = $request->input('alamat');
        $posts->email = $request->input('email');
        $posts->nomor_wa = $request->input('nomor_wa');
        $posts->save();

        return redirect()->route('posts.index')->with('success','Data diri berhasil diperbaharui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $posts = guestbook::find($id);

        if ($posts) {
            $posts->delete();

            return redirect()->route('posts.index')->with('success', 'Data diri telah dihapus.');
        } else {
            return redirect()->route('posts.index')->with('error', 'Data diri tidak ditemukan.');
        }
    }

    // public function __construct()
    // {
    //     $this->middleware('auth');

    // }
}
