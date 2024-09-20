<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Events\CustomMessageEvent; //for pusher integration

class MovieController extends Controller
{

    public function index()
    {

        $data = DB::table('movies')
            ->leftJoin('category', 'movies.category_id', '=', 'category.id')
            ->select('movies.*', 'category.category')
            ->get();

        $actionCount = DB::table('movies')
            ->where('category_id', 1)
            ->count();
        $loveStoryCount = DB::table('movies')
            ->where('category_id', 2)
            ->count();
        $horrorCount = DB::table('movies')
            ->where('category_id', 3)
            ->count();

        //event(new CustomMessageEvent("Someone visited your movie listing page"));

        return view('pages.page1', compact('data', 'actionCount', 'loveStoryCount', 'horrorCount'));
    }
    public function show_add_form()
    {
        $categories = DB::table('category')->get();

        return view('pages.add-movie-form', compact('categories'));
    }

    public function add_movie(Request $request)
    {
        # Validation
        $request->validate([
            'category_id' => 'required|integer|exists:category,id',
            'title' => 'required|string|max:255',
            'decription' => 'required|string',
            'star_rating' => 'required|numeric|min:1|max:5',
            'director' => 'required|string|max:150',
            'date_published' => 'required|date',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
        ]);

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
        $categories = DB::table('category')->get();
        $data = DB::table('movies')->where('id', $id)->get();
        return view('pages.edit-movie-form', compact('data', 'categories'));
    }

    public function edit_movie(Request $request, $id)
    {
        # Validation
        $request->validate([
            'category_id' => 'required|integer|exists:category,id',
            'title' => 'required|string|max:255',
            'decription' => 'required|string',
            'star_rating' => 'required|numeric|min:1|max:5',
            'director' => 'required|string|max:150',
            'date_published' => 'required|date',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        # Handle image upload
        $filename = NULL;
        if ($request->file('picture')) {
            $file = $request->file('picture');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('_uploads'), $filename);
        }

        $query = DB::table('movies')
            ->where('id', $id)
            ->update([
                'category_id' => $request->input('category_id'),
                'title' => $request->input('title'),
                'decription' => $request->input('description'),
                'star_rating' => $request->input('star_rating'),
                'director' => $request->input('director'),
                'date_published' => $request->input('date_published'),
                'picture' => $filename,
                'updated_at' => now()
            ]);

        if ($query) {
            return redirect(url('/page1'))->with('success', 'Record Successfully Updated');
        }
    }

    public function do_print()
    {
        $data = DB::table('movies')
            ->leftJoin('category', 'movies.category_id', '=', 'category.id')
            ->select('movies.*', 'category.category')
            ->get();

        $pdf = Pdf::loadView('pages.print', compact('data'));
        $pdf->set_paper('A4', 'landscape');
        $pdf->output();
        return $pdf->stream();
        //return $pdf->download('movie-listings.pdf');

        //return view('pages.print', compact('data'));
    }
}
