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
                                        <h4>All Blog Post</h4>
                                        <a href="" class="btn btn-success float-right">Create New Post</a>
                                    </div>
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Category Name</th>
                                                    <th>Post Title</th>
                                                    <th>Post Detail</th>
                                                    <th>Post Image</th>
                                                    <th>Crated At</th>
                                                    <th>Action</th>

                                                </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <td>1</td>
                                                        <td>Name</td>
                                                        <td>Title</td>
                                                        <td>Details</td>
                                                        <td>Images</td>
                                                        <td>7 days ago</td>
                                                        <td>
                                                            <a href="" class="btn btn-primary btn-sm"><i class="ti-pencil-alt" style="font-size: 18px"></i></a>
                                                            <a href="" class="btn btn-danger btn-sm"><i class="ti-trash" style="font-size: 18px"></i></a>

                                                        </td>
                                                    </tr>
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
