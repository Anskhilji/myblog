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
                                        <h4 class="float-left">All Blog Post</h4>
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
                                                    <th style="width: 10.66%">ID</th>
                                                    <th style="width: 10.66%">Post Title</th>
                                                    <th style="width: 10.66%">Category Name</th>
                                                    <th style="width: 10.66%">Post Image</th>
                                                    <th style="width: 12.66%">Crated At</th>
                                                    <th style="width: 10.66%">Post View</th>
                                                    <th>Action</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php($i = 1)
                                                    @foreach($posts as $post)
                                                        <tr>
                                                            <td>{{ $i++ }}</td>
                                                            <td>{{ \Illuminate\Support\Str::limit($post->post_title,20 ) }}</td>
                                                            <td>{{getCategoryName($post->category_id)}}</td>
                                                            <td>
                                                                <img src="{{asset( $post->post_cover_image)}}" alt="" width="80" height="60">
                                                            </td>
                                                            <td>{{ $post->created_at->diffForHumans() }}</td>
                                                            <td>{{ $post->post_view }}</td>
                                                            <td>
                                                                @if($post->post_status == 1)
                                                                    <a href="{{ route('post.draft', $post->id) }}" class="btn btn-inverse  mr-1 btn-sm" title="Draft" style="float: left">
                                                                        <i class="fa fa-thumbs-o-down fa-1x"></i>
                                                                    </a>
                                                                @else
                                                                    <a href="{{ route('post.publish', $post->id) }}" class="btn btn-warning  mr-1 btn-sm" title="Publish" style="float: left">
                                                                        <i class="fa fa-thumbs-o-up fa-1x"></i>
                                                                    </a>
                                                                @endif
                                                                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary mr-1 btn-sm" style="float: left">Edit</a>
                                                                <form action="{{ route('post.delete', $post) }}" method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <input type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger mr-1 btn-sm" value="Delete">
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
