@extends('layouts.app')

@section('content')
    <x-page-header pageTitle="Page 2" btnCaption="Action Button Page 2" class="bg-white" />

    <div class="wrapper wrapper-content">
        <div class="middle-box text-center animated fadeInRightBig">
            <h3 class="font-bold">This is page content</h3>
            <div class="error-desc">
                You can create here any grid layout you want. And any variation layout you imagine:) Check out
                main dashboard and other site. It use many different layout.
                <br /><a href="index.html" class="btn btn-primary m-t">Dashboard</a>
            </div>
        </div>
    </div>
@endsection
