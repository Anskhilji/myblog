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
                                        <h4>All Category</h4>
                                        <a href="{{ route('add.category') }}" class="btn btn-success float-right">Add Category</a>
                                    </div>
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Category Name</th>
                                                    <th>Crated At</th>
                                                    <th>Action</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php($i = 1)
                                                    @foreach($categories as $category)
                                                        <tr>
                                                            <td>{{$i++}}</td>
                                                            <td>{{ $category->category_name }}</td>
                                                            <td>{{ $category->created_at->diffForHumans() }}</td>
                                                            <td>
                                                                <a href="{{ route('edit.category', $category->id) }}" class="btn btn-primary float-left mr-2">Edit</a>
                                                                <form action="{{ route('delete.category', $category->id) }}" method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure? It will IRREVERSIBLY delete all the post of related this category')" value="Delete">
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
