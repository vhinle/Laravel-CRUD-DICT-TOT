@extends('layouts.app')

@section('content')
    @if (Session::has('success'))
        <p class="alert alert-primary">{{ Session::get('success') }}</p>
    @endif

    @if (Session::has('error'))
        <p class="alert alert-warning">Process Failed!</p>
    @endif


    <x-page-header pageTitle="Manage Books" class="bg-white" />
    <a href="{{ url('/add-book-form') }}" class="btn btn-primary btn-lg">Add New Book</a>
    <div class="wrapper wrapper-content">
        <div class="row">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>TITLE</th>
                        <th>DESCRIPTION</th>
                        <th>COUNTRY</th>
                        <th>STOCKS</th>
                        <th>PHOTO</th>
                        <th>CREATED DATE</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->title }}</td>
                            <td>{{ $row->description }}</td>
                            <td>{{ $row->stocks }}</td>
                            <td>{{ $row->amount }}</td>
                            <td><img src="{{ $row->photo }}" height="45"></td>
                            <td>{{ \Carbon\Carbon::parse($row->created_at)->format('d M Y') }}</td>
                            <td>
                                <a href="{{ url('/edit-form-book/' . $row->id) }}" class="btn btn-info"><i
                                        class="fa fa-edit"></i></a>
                                <a href="{{ url('/delete-book/' . $row->id) }}" class="btn btn-danger"><i
                                        class="fa fa-trash"></i></a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
