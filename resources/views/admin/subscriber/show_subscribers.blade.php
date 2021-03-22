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
                                    <div class="card-header">
                                        <h4>Subscriber List</h4>
                                        <a href="{{ route('send.email') }}" class="btn btn-success float-right">Send Email</a>
                                    </div>
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Subsciber Name</th>
                                                    <th>Email</th>
                                                    <th>Subsciberd At</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php($i = 1)
                                                @foreach($subscribers as $subscriber)
                                                    <tr>
                                                        <td>{{$i++}}</td>
                                                        <td>{{ $subscriber->name }}</td>
                                                        <td>{{ $subscriber->email }}</td>
                                                        <td>{{ $subscriber->created_at->diffForHumans() }}</td>
                                                            <td>
                                                                <a href="{{ route('edit.subscriber', $subscriber->id) }}" class="btn btn-primary float-left mr-2">Edit</a>
                                                                <form action="{{ route('delete.subscriber', $subscriber) }}" method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')" value="Delete">
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
