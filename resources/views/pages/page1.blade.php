@extends('layouts.app')

@section('content')
    @if (Session::has('success'))
        <p class="alert alert-primary">{{ Session::get('success') }}</p>
    @endif

    @if (Session::has('error'))
        <p class="alert alert-warning">Process Failed!</p>
    @endif

    <x-page-header pageTitle="Page 1" btnCaption="Action Button Page 1" class="bg-white" />

    <div class="wrapper wrapper-content">

        <div class="row">
            <a href="{{ url('/add-movie-form') }}" class="btn btn-primary btn-lg">Add Movie</a>

            <table class="table table-bordered table-striped table-hover mt-2">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>TITLE</th>
                        <th>DESCRIPTION</th>
                        <th>RATING</th>
                        <th>PUBLISHED</th>
                        <th>DIRECTOR</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->title }}</td>
                            <td>{{ $row->decription }}</td>
                            <td>{{ $row->star_rating }}</td>
                            <td>{{ \Carbon\Carbon::parse($row->date_published)->format('d M Y') }}</td>
                            <td>{{ $row->director }}</td>
                            <td>
                                <a href="{{ url('/edit-movie-form/' . $row->id) }}" class="btn btn-info"><i
                                        class="fa fa-edit"></i>
                                    <a href="{{ url('/delete-movie/' . $row->id) }}" class="btn btn-danger"><i
                                            class="fa fa-trash"></i>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
