@extends('layouts.app')

@section('content')
    <x-page-header pageTitle="Manage Posts" class="bg-white" />

    <div class="wrapper wrapper-content">
        <div class="animated fadeInRightBig">

            <div class="row">
                <div class="col-12">
                    <!-- iBox -->
                    <div class="ibox">

                        <div class="ibox-title">
                            <h2>All of all messages</h2>
                        </div>

                        <div class="ibox-content">
                            <table class="table table-bordered table-striped table-hover" id="postTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>TITLE</th>
                                        <th>POST</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- JQuery content here..-->
                                </tbody>
                            </table>
                        </div>

                        <div class="ibox-footer">

                        </div>

                    </div>
                    <!-- /iBox -->

                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '{{ url('/api/posts') }}',
                method: 'GET',
                success: function(data) {
                    //console.table(data); //show data in tabular form
                    let tbody = $('#postTable tbody');
                    tbody.empty();
                    data.forEach(function(post) {
                        var row = '<tr>' +
                            '<td>' + post.id + '</td>' +
                            '<td>' + post.title + '</td>' +
                            '<td>' + post.story + '</td>' +
                            '</tr>';
                        tbody.append(row);
                    });


                    // let tbody = $('table tbody');
                    // tbody.empty();
                    // data.forEach(function(post) {
                    //     var row = '<tr>' +
                    //         '<td>' + post.id + '</td>' +
                    //         '<td>' + post.title + '</td>' +
                    //         '<td>' + post.story + '</td>' +
                    //         '</tr>';
                    //     tbody.append(row);
                    // });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching posts:', error);
                }
            });
        });
    </script>
@endsection
