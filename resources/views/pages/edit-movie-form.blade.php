@extends('layouts.app')

@section('content')
    <x-page-header pageTitle="Edit Movie" btnCaption="Action Button Page 1" class="bg-white" />

    <div class="wrapper wrapper-content">
        <div class="animated fadeInRightBig">
            <div class="row">
                <div class="col-4">
                    <form action="{{ url('/edit-movie/' . $data[0]->id) }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="genre">Category</label>
                            <select class="form-control" id="category_id" name="category_id" required>
                                @foreach ($categories as $c)
                                    <option value="{{ $c->id }}" @selected($c->id == $data[0]->category_id)>
                                        {{ $c->category }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="alert alert-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required
                                value="{{ $data[0]->title }}">
                            @error('title')
                                <div class="alert alert-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required> {{ $data[0]->decription }} </textarea>
                            @error('decription')
                                <div class="alert alert-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="director">Director</label>
                            <input type="text" class="form-control" id="director" name="director" required
                                value="{{ $data[0]->director }}">
                            @error('director')
                                <div class="alert alert-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="star_rating">Star Rating</label>
                            <input type="number" class="form-control" id="star_rating" name="star_rating" min="1"
                                max="5" required value="{{ $data[0]->star_rating }}">
                            @error('star_rating')
                                <div class="alert alert-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" class="form-control" id="picture" name="picture" accept="image/*"
                                required>
                            @error('picture')
                                <div class="alert alert-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="date_published">Date Published</label>
                            <input type="date" class="form-control" id="date_published" name="date_published" required
                                value="{{ $data[0]->date_published }}">
                            @error('date_published')
                                <div class="alert alert-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
