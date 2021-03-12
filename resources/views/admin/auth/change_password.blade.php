@extends('admin.layouts.app')
@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">

                    <form action="{{ route('store.changed.info') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsernamel1">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ decrypt($admin->name) }}" id="exampleInputUsernamel1" aria-describedby="emailHelp">
                            <span class="text-danger">@error('name'){{$message}}@enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputUsernamel1">Email</label>
                            <input type="text" class="form-control" name="email" value="{{ decrypt($admin->email) }}" id="exampleInputUsernamel1" aria-describedby="emailHelp">
                            <span class="text-danger">@error('email'){{$message}}@enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputSlug1">Slug</label>
                            <input type="text" class="form-control" name="slug" value="{{ decrypt($admin->slug) }}" id="exampleInputSlug1">
                            <span class="text-danger">@error('slug'){{$message}}@enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Old password</label>
                            <input type="password" class="form-control" name="old_password" id="exampleInputPassword1" placeholder="Enter old password">
                            <span class="text-danger">@error('old_password'){{$message}}@enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">New password</label>
                            <input type="password" class="form-control" name="password"  id="exampleInputPassword1" placeholder="Enter new password">
                            <span class="text-danger">@error('password'){{$message}}@enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Re-type password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="exampleInputPassword1" placeholder="Enter new password">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
