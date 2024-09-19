@extends('layouts.app')

@section('content')
    <x-page-header pageTitle="Add Movie" btnCaption="Action Button Page 1" class="bg-white" />

    <div class="wrapper wrapper-content">
        <div class="animated fadeInRightBig">
            <div class="row">
                <div class="col-4">
                    <form action="{{ url('/add-movie') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="genre">Category</label>
                            <select class="form-control" id="category_id" name="category_id" required>
                                @foreach ($categories as $c)
                                    <option value="{{ $c->id }}">{{ $c->category }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="director">Director</label>
                            <input type="text" class="form-control" id="director" name="director" required>
                        </div>

                        <div class="form-group">
                            <label for="star_rating">Star Rating</label>
                            <input type="number" class="form-control" id="star_rating" name="star_rating" min="1"
                                max="10" required>
                        </div>
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" class="form-control" id="picture" name="picture" accept="image/*"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="date_published">Date Published</label>
                            <input type="date" class="form-control" id="date_published" name="date_published" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
