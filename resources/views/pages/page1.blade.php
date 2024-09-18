@extends('layouts.app')

@section('content')
    <x-page-header pageTitle="Page 1" btnCaption="Action Button Page 1" class="bg-white" />

    <div class="wrapper wrapper-content">

        <div class="row">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>TITLE</th>
                        <th>DESCRIPTION</th>
                        <th>RATING</th>
                        <th>PUBLISHED</th>
                        <th>DIRECTOR</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->title }}</td>
                            <td>{{ $row->decription }}</td>
                            <td>{{ $row->star_rating }}</td>
                            <td>{{ $row->date_published }}</td>
                            <td>{{ $row->director }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
