@extends('admin.layouts.app')
@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    {{--{{ dd($categories) }}--}}
                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- Zero config.table start -->
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        <h4>Author List</h4>
                                        <a href="{{ route('create.new.author') }}" class="btn btn-success float-right">Add New</a>
                                    </div>
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th style="width: 10%">Author Name</th>
                                                    <th style="width: 10%">Status</th>
                                                    <th>Total Posts</th>
                                                    <th>Crated At</th>
                                                    <th>Action</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php($i = 1)
                                                @foreach($authors as $author)
                                                    <tr>
                                                        <td>{{$i++}}</td>
                                                        <td>{{ $author->name }}</td>
                                                        <td>{{ $author->status == 1 ? 'Admin' : 'Author' }}</td>
                                                        <td>{{ $author->posts }}</td>
                                                        <td>{{ $author->created_at->diffForHumans() }}</td>
                                                        <td>
                                                            @if($author->status != 1)
                                                                <a href="{{ route('edit.author', $author->id) }}" class="btn btn-primary btn-sm float-left mr-2">Edit</a>
                                                                <form action="{{ route('delete.author', $author) }}" method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <input type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure? All post will IRREVERSIBLY converted into Admin Post.')" value="Delete">
                                                                </form>
                                                            @else
                                                                <a href="{{ route('edit.author', $author->id) }}" class="btn btn-primary btn-sm float-left mr-2">Edit</a>
                                                            @endif
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
