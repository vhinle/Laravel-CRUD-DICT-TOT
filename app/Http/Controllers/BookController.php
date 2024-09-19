<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index()
    {
        $data = DB::table('books')->get();
        return view('pages.page2', compact('data'));
    }

    public function show_add_form()
    {
        return view('pages.add-book-form');
    }

    public function add_book(Request $request)
    {
        $query = DB::table('books')
            ->insert([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'country_id' => $request->input('country_id'),
                'stocks' => $request->input('stocks'),
                'amount' => $request->input('amount'),
                'photo' =>  fake()->imageUrl(),
                'created_at' => now()
            ]);

        if ($query) {
            return redirect(url('/page2'))->with('success', 'New Record Successfully Saved');
        }
    }

    public function delete_book($id)
    {
        $query = DB::table('books')
            ->where('id', $id)
            ->delete();

        if ($query) {
            return redirect(url('/page2'))->with('success', 'Record Successfully Deleted');
        }
    }


    public function show_edit_form($id)
    {
        $data = DB::table('books')->where('id', $id)->get();
        return view('pages.edit-book-form', compact('data'));
    }

    public function edit_book(Request $request, $id)
    {
        $query = DB::table('books')
            ->where('id', $id)
            ->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'country_id' => $request->input('country_id'),
                'stocks' => $request->input('stocks'),
                'amount' => $request->input('amount'),
                'photo' =>  fake()->imageUrl(),
                'updated_at' => now()
            ]);

        if ($query) {
            return redirect(url('/page2'))->with('success', 'Record Successfully Updated');
        }
    }
}
