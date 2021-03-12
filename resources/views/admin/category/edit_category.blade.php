@extends('admin.layouts.app')
@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">

                    <form action="{{ route('update.category', $category->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsernamel1">Name</label>
                            <input type="text" class="form-control" name="category" value="{{ $category->category_name }}" id="exampleInputUsernamel1" aria-describedby="emailHelp">
                            <span class="text-danger">@error('category'){{$message}}@enderror</span>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
