<?php

namespace App\Http\Controllers\Api;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AuthorResource;
use App\Http\Resources\AuthorCollection;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd(Author::latest()->get()->first()->posts());

        // return new AuthorResource(Author::find(1));

        $perPage = 6;
        $path = $request->getUriForPath('') . $request->getPathInfo();
        // $authors = Author::with('posts')->get();
        $authors = Author::paginate(Author::all(), $perPage)->withPath($path);
        return new AuthorCollection($authors);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required',
        //     'username' => 'required|unique:authors|alpha',
        //     'email' => 'required|email:dns|unique:authors',
        //     'password' => 'required|min:8'
        // ]);

        // if ($validator->fails()) {
        //     return new AuthorResource(false, $validator->errors(), 422);
        // }

        // $author = Author::create($validator->getData());

        // return new AuthorResource(true, $author);
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
