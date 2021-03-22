@extends('admin.layouts.app')
@section('content')


    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">

                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- Zero config.table start -->
                                <div class="card">
                                    <div class="card-header">
                                        <h4>All Draft Post</h4>
                                        <a href="{{ route('all.draft.post') }}" class="btn btn-mat {{ (request()->segment('3') == "draft" ) ? "btn-inverse" : "btn-info" }} float-right ml-2">Draft</a>
                                        <a href="{{ route('all.publish.post') }}" class="btn btn-mat {{ (request()->segment('3') == "publish" ) ? "btn-inverse" : "btn-info" }} float-right ml-2">Published</a>
                                        <a href="{{ route('create.post') }}" class="btn btn-mat btn-info float-right ml-2">Create New</a>
                                        <a href="{{ route('all.post') }}" class="btn btn-mat float-right  {{(request()->segment('2') == "all" ) && (request()->segment('3') == "post" ) ? "btn-inverse" : "btn-info" }}">All Post</a>

                                    </div>
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th style="width: 20.66%">Post Title</th>
                                                    <th style="width: 20.66%">Category Name</th>
                                                    <th style="width: 10.66%">Post Image</th>
                                                    <th>Crated At</th>
                                                    <th>Action</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php($i = 1)
                                                @foreach($posts as $post)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td style="width: 20.66%">{{ $post->post_title }}</td>
                                                        <td style="width: 20.66%">{{getCategoryName($post->category_id)}}</td>
                                                        <td style="width: 10.66%">
                                                            <img src="{{asset( $post->post_cover_image)}}" alt="" width="80" height="60">
                                                        </td>
                                                        <td>{{ $post->created_at->diffForHumans() }}</td>
                                                        <td>
                                                            @if($post->post_status == 1)
                                                                <a href="{{ route('post.draft', $post->id) }}" class="btn btn-inverse  mr-1" title="Draft" style="float: left">
                                                                    <i class="fa fa-thumbs-o-down fa-1x"></i>
                                                                </a>
                                                            @else
                                                                <a href="{{ route('post.publish', $post->id) }}" class="btn btn-warning  mr-1" title="Publish" style="float: left">
                                                                    <i class="fa fa-thumbs-o-up fa-1x"></i>
                                                                </a>
                                                            @endif
                                                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary mr-1" style="float: left">Edit</a>
                                                            <form action="{{ route('post.delete', $post) }}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger mr-1" value="Delete">
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Zero config.table end -->


                            </div>
                        </div>
                    </div>
                </div>
@endsection
