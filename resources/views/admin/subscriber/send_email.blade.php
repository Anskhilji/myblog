@extends('admin.layouts.app')
@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    {{--{{ dd($categories) }}--}}
                    <div class="page-body">
                        <form action="{{ route('send.email.to.subscribers') }}" method="post">
                            @csrf
                        <div class="row">

                            <div class="col-sm-6 pr-0">
                                <!-- Zero config.table start -->
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Subscriber List</h4>
                                    </div>
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <span class="text-danger">@error('selected_email'){{$message}}@enderror</span>

                                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                <tr>
                                                    <th style="width: 5%">
                                                        <input type="checkbox" id="check_all" name="select_all" value="all">
                                                    </th>
                                                    <th style="width: 10%">#</th>
                                                    <th style="width: 10%">Subscriber Name</th>
                                                    <th style="width: 10%">Email</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php($i = 1)
                                                @foreach($subscribers as $subscriber)
                                                    <tr>
                                                        <td><input type="checkbox" class="checks" name="selected_email[]" value="{{$subscriber->id}}"></td>
                                                        <td>{{$i++}}</td>
                                                        <td>{{ $subscriber->name }}</td>
                                                        <td>{{ $subscriber->email }}</td>
                                                    </tr>
                                                @endforeach
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Zero config.table end -->
                            </div>
                            <div class="col-sm-6">
                                <!-- Zero config.table start -->
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Send Email</h4>
                                    </div>
                                    <div class="card-block">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Subject</label>
                                                <input type="text" class="form-control" name="email_subject" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                <span class="text-danger">@error('email_subject'){{ $message }}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Detail</label>
                                                <textarea class="form-control oneditor" name="email_detail" id="PostDetails" rows="5" placeholder="Post details...">{!! old('post_detail') !!}</textarea>
                                                <span class="text-danger">@error('email_detail'){{ $message }}@enderror</span>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Send</button>
                                    </div>
                                </div>
                                <!-- Zero config.table end -->

                            </div>
                        </div>
                        </form>

                    </div>
                </div>


                <script>
                    let checked_all = document.querySelector('#check_all');
                    let checkes = document.querySelectorAll('.checks');
                    checked_all.addEventListener('change', function (){
                        if (checked_all.checked == true){
                          checkes.forEach(e=>{
                              e.checked = true;
                          });
                        }else{
                            checkes.forEach(e=>{
                                e.checked = false;
                            });
                        }
                    });
                    checkes.forEach(e => {
                       e.addEventListener('change', function (e){
                           if (e.target.checked == false){
                               checked_all.checked = false;
                           }
                       }) ;
                    });


                </script>
@endsection
