@extends('admin.layouts.app')
@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">

                    <form action="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Category</label>
                                    <select class="form-control" name="category" id="exampleFormControlSelect1">
                                        <option value="" selected disabled>Choose Category</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <span class="text-danger">@error('category'){{$message}}@enderror</span>

                            </div>
                            <div class="col-md-6">
                                <label for="#posttitle">Post Title</label>
                                <div class="input-group">
                                    <input type="text" name="post_title" class="form-control" id="posttitle" placeholder="Post Title">
                                    <span class="text-danger">@error('post_title'){{$message}}@enderror</span>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="#postslug">Slug</label>
                                <div class="input-group">
                                    <input type="text" name="slug" class="form-control" id="postslug" placeholder="Slug">
                                    <span class="text-danger">@error('slug'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="#postcategory">Meta Title</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="meta_title" id="postcategory" placeholder="Post Title">
                                    <span class="input-group-addon" >5000</span>
                                    <span class="text-danger">@error('meta_title'){{$message}}@enderror</span>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Meta Description</label>
                                    <textarea class="form-control" name="meta_description" id="exampleFormControlTextarea1" rows="5"></textarea>
                                    <span class="text-danger">@error('meta_description'){{$message}}@enderror</span>
                                </div>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
