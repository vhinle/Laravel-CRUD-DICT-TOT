@extends('layouts.app')

@section('content')
    <x-page-header pageTitle="Edit Book" btnCaption="" class="bg-white" />

    <div class="wrapper wrapper-content">
        <div class="animated fadeInRightBig">
            <div class="row">
                <div class="col-5">
                    <form action="{{ url('/edit-form-book/' . $data[0]->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ $data[0]->title }}" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $data[0]->description }}</textarea>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="country_id">Country Code</label>
                                <input type="number" class="form-control" id="country_id" name="country_id" min="1"
                                    max="100" value="{{ $data[0]->country_id }}"required>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="stocks">Stocks</label>
                                <input type="number" class="form-control" id="stocks" name="stocks"
                                    min="1"value="{{ $data[0]->stocks }}" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="amount">Amount</label>
                                <input type="number" class="form-control" id="amount" name="amount" min="1"
                                    step="0.01" value="{{ $data[0]->amount }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
