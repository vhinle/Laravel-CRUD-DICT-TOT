<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{

    public function index()
    {

        $data = DB::table('movies')
            ->join('category', 'movies.category_id', '=', 'category.id')
            ->select('movies.*', 'category.category')
            ->get();
        return view('pages.page1', compact('data'));
    }
    public function show_add_form()
    {
        $categories = DB::table('category')->get();

        return view('pages.add-movie-form', compact('categories'));
    }

    public function add_movie(Request $request)
    {
        //Check image
        $filename = NULL;
        if ($request->file('picture')) {
            $file = $request->file('picture');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('_uploads'), $filename);
        }


        $query = DB::table('movies')
            ->insert([
                'category_id' => $request->input('category_id'),
                'title' => $request->input('title'),
                'decription' => $request->input('description'),
                'star_rating' => $request->input('star_rating'),
                'director' => $request->input('director'),
                'date_published' => $request->input('date_published'),
                'picture' => $filename,
                'created_at' => now()
            ]);

        if ($query) {
            return redirect(url('/page1'))->with('success', 'New Record Successfully Saved');
        }
    }

    public function do_delete($id)
    {
        $query = DB::table('movies')
            ->where('id', $id)
            ->delete();

        if ($query) {
            return redirect(url('/page1'))->with('success', 'Record Successfully Deleted');
        }
    }


    public function show_edit_form($id)
    {
        $data = DB::table('movies')->where('id', $id)->get();
        return view('pages.edit-movie-form', compact('data'));
    }
    public function edit_movie(Request $request, $id)
    {
        $query = DB::table('movies')
            ->where('id', $id)
            ->update([
                'title' => $request->input('title'),
                'decription' => $request->input('description'),
                'star_rating' => $request->input('star_rating'),
                'director' => $request->input('director'),
                'date_published' => $request->input('date_published'),
                'updated_at' => now()
            ]);

        if ($query) {
            return redirect(url('/page1'))->with('success', 'Record Successfully Updated');
        }
    }
}
