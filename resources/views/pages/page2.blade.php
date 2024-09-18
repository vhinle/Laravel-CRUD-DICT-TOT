@extends('layouts.app')

@section('content')
    <x-page-header pageTitle="Page 2" btnCaption="Action Button Page 2" class="bg-white" />

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
                            <td>{{ $row->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
