@extends('admin.layouts.app')
@section('content')
    <style>
        .bootstrap-tagsinput{
            width: 1100px !important;
        }
        .input-group {
            margin-bottom: 0px !important;
        }
    </style>
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <form action="{{ route('update.subscriber', $subscriber->id) }}" method="post">
                        @csrf
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputUsernamel1">Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name', $subscriber->name) }}" id="exampleInputUsernamel1" aria-describedby="emailHelp" placeholder="Subscriber Name">
                                        <span class="text-danger">@error('name'){{$message}}@enderror</span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="#postslug">Email<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="email" name="email" value="{{ old('email', $subscriber->email) }}" class="form-control" placeholder="Subscriber Email">
                                    </div>
                                    <span class="text-danger">@error('email'){{$message}}@enderror</span>
                                </div>

                            </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
