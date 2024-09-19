@extends('layouts.app')

@section('content')
    <x-page-header pageTitle="New Book" btnCaption="" class="bg-white" />

    <div class="wrapper wrapper-content">
        <div class="animated fadeInRightBig">
            <div class="row">
                <div class="col-5">
                    <form action="{{ url('/add-book') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="country_id">Country Code</label>
                                <input type="number" class="form-control" id="country_id" name="country_id" min="1"
                                    max="100" required>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="stocks">Stocks</label>
                                <input type="number" class="form-control" id="stocks" name="stocks" min="1"
                                    required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="amount">Amount</label>
                                <input type="number" class="form-control" id="amount" name="amount" min="1"
                                    step="0.01" required>
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
