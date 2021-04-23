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
                                        <h4>All Faqs</h4>
                                        <a href="{{ route('show.faqs') }}" class="btn btn-success float-right">Add Faqs</a>
                                    </div>
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                <tr>
                                                    <th style="width: 5%">ID</th>
                                                    <th style="width: 15%">Question</th>
                                                    <th style="width: 30%">Answer</th>
                                                    <th style="width: 10%">Crated At</th>
                                                    <th>Action</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php($i = 1)
                                                @foreach($faqs as $faq)
                                                    <tr>
                                                        <td>{{$i++}}</td>
                                                        <td>{{ $faq->question }}</td>
                                                        <td>{!!  \Illuminate\Support\Str::limit($faq->ans,20) !!}</td>
                                                        <td>{{ $faq->created_at->diffForHumans() }}</td>
                                                            <td>
                                                                <a href="{{ route('edit.faqs', $faq->id) }}" class="btn btn-primary float-left mr-2">Edit</a>
                                                                <form action="{{ route('delete.faqs', $faq) }}" method="post">
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
            </div>
        </div>
    </div>


@endsection
