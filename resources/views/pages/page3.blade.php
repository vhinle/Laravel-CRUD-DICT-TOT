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
                            <div class="ibox-tools">
                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                                    id="btn-add-modal">Create New Post</a>
                            </div>
                        </div>

                        <div class="ibox-content">
                            <table class="table table-bordered table-striped table-hover" id="postTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>TITLE</th>
                                        <th>POST</th>
                                        <th>ACTION</th>
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

    <!-- Modal -->
    <div class="modal fade" id="createPostModal" tabindex="-1" role="dialog" aria-labelledby="createPostModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="createPostForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createPostModalLabel">Create New Post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="postTitle">Title</label>
                            <input type="text" class="form-control" id="postTitle" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="postStory">Post</label>
                            <textarea class="form-control" id="postStory" name="story" rows="3" required></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <button type="button " class="btn btn-primary" id="savePostButton">Save Post</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /Modal -->
@endsection

@section('scripts')
    <script>
        //call function
        loadData();

        //====== SHOW MODAL ==========
        $("#btn-add-modal").click(function() {
            $("#createPostModal").modal('show');
        });

        //====== SAVE POST ==========
        $("#savePostButton").click(function(e) {
            e.preventDefault();

            const title = $('#postTitle').val();
            const story = $('#postStory').val();

            $.ajax({
                url: '{{ url('/api/posts') }}',
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#createPostModal').modal('hide');
                    loadData();
                    alert('Post created successfully!');
                },
                error: function(xhr, status, error) {
                    console.error('Error creating post:', error);
                    alert('Failed to create post. Please try again.');
                }
            });
        });


        //====== LOAD DATA ==========
        function loadData() {
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
                                '<td>' +
                                '<button class="btn btn-xm btn-warning edit-post" data-id="' +
                                post.id + '"><i class="fa fa-pencil"></i></button> ' +
                                '<button class="btn btn-xm btn-danger delete-post" data-id="' +
                                post.id + '"><i class="fa fa-trash"></i></button>' +
                                '</td>' +
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
        }

        //====== UPDATE POST ==========
        $(document).on('click', '.edit-post', function() {
            const postId = $(this).data('id');
            //alert(postId);
            $.ajax({
                url: '{{ url('/api/posts') }}/' + postId,
                method: 'GET',
                success: function(post) {

                    $('#postTitle').val(post.title);
                    $('#postStory').val(post.story);
                    // // Assuming you have an array of field names
                    // const fields = ['title', 'story', 'field1', 'field2', 'field3', 'field4', 'field5', 'field6', 'field7', 'field8', 'field9', 'field10'];

                    // // Loop through each field and set its value
                    // fields.forEach(function(field) {
                    //     $('#' + field).val(post[field]);
                    // });

                    $('#createPostModal').modal('show');
                    $('#savePostButton').off('click').on('click', function(e) {

                        e.preventDefault();
                        $.ajax({
                            url: '{{ url('/api/posts') }}/' + postId,
                            method: 'PUT',
                            data: {
                                title: $('#postTitle').val(),
                                story: $('#postStory').val()
                            },
                            success: function(response) {
                                $('#createPostModal').modal('hide');
                                loadData();
                                alert('Post updated successfully!');
                            },
                            error: function(xhr, status, error) {
                                console.error('Error updating post:', error);

                                if (xhr.responseJSON && xhr.responseJSON.errors) {
                                    const errors = xhr.responseJSON.errors;
                                    if (errors.title) {
                                        $('#postTitle').after(
                                            '<div class="alert alert-danger"><small>' +
                                            errors.title[0] + '</small></div>');
                                    }
                                    if (errors.story) {
                                        $('#postStory').after(
                                            '<div class="alert alert-danger"><small>' +
                                            errors.story[0] + '</small></div>');
                                    }
                                }
                                alert('Failed to update post. Please try again.');
                            }
                        });
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching post:', error);
                    alert('Failed to fetch post details. Please try again.');
                }
            });
        });

        //====== DELETE POST ==========
        $(document).on('click', '.delete-post', function() {
            const postId = $(this).data('id');
            if (confirm('Are you sure you want to delete this post?')) {
                $.ajax({
                    url: '{{ url('/api/posts') }}/' + postId,
                    method: 'DELETE',
                    success: function(response) {
                        loadData();
                        alert('Post deleted successfully!');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error deleting post:', error);
                        alert('Failed to delete post. Please try again.');
                    }
                });
            }
        });
    </script>
@endsection
