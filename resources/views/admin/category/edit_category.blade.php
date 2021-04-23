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

                    <form action="{{ route('update.category', $category->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputUsernamel1">Category Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="category_name" value="{{ old('category_name', $category->category_name) }}" id="exampleInputUsernamel1" aria-describedby="emailHelp" placeholder="Category Name">
                                    <span class="text-danger">@error('category_name'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="#postslug">Slug<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" name="slug" value="{{ old('slug',$category->slug) }}" class="form-control post-slug" id="postslug" placeholder="Slug">
                                </div>
                                <span class="text-danger">@error('slug'){{$message}}@enderror</span>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <label for="#metatitle">Meta Title<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control meta-input" name="meta_title" value="{{ old('meta_title', $category->meta_title) }}"  id="metatitle" placeholder="Meta Title">
                                    <span class="input-group-addon meta-title" >{{ strlen($category->meta_title) }}</span>
                                </div>
                                <span class="text-danger">@error('meta_title'){{$message}}@enderror</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="#metatitle">Meta Description</label>
                                <div class="input-group">
                                    <textarea class="form-control meta-input" name="meta_description" id="schema" rows="5">{!! old('meta_description', $category->meta_description) !!} </textarea>
                                    <span class="input-group-addon meta-desc" >{{ strlen($category->meta_description) }}</span>
                                </div>
                                <span class="text-danger">@error('meta_description'){{$message}}@enderror</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="#metatags">Meta Tags</label>
                                <div class="input-group">
                                    <input type="text" class="form-control meta-tags" data-role="tagsinput" name="meta_tags" value="{{ old('meta_tags', $category->meta_tags) }}" id="metatags" placeholder="Meta Title">
                                </div>
                                <span class="text-danger">@error('meta_tags'){{$message}}@enderror</span>

                            </div>
                        </div>
                        <?php
                        $schema_old = old('category_schema')?old('category_schema'):json_decode($category->category_schema);
                        ?>
                        @if(!empty($schema_old) and count($schema_old) > 0)
                            @foreach($schema_old as $key => $value)
                                @if($key == 0)
                                    <div class="row add-schema">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="#schema">Schema</label>
                                                <div class="float-right m-2 test">
                                                    <span>Add More</span>
                                                    <button type="button" class="btn btn-success" id="add-more"><i class="ti-plus"></i></button>
                                                </div>
                                                <textarea class="form-control" name="category_schema[]"  id="schema" rows="5">{!! $value !!}</textarea>
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="row add-schema">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="#schema">Schema</label>
                                                <div class="float-right m-2 test">
                                                    <span>Add More</span>
                                                    <button type="button" class="btn btn-danger remove_schema"><i class="ti-close"></i></button>
                                                </div>
                                                <textarea class="form-control" name="category_schema[]"  id="schema" rows="5">{!! $value !!}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                @endif
                            @endforeach
                            <script>
                                let oldCross = document.querySelectorAll('.remove_schema');
                                oldCross.forEach(e => {
                                    e.addEventListener('click', function (e) {
                                        e.preventDefault();
                                        e.target.closest('.add-schema').remove();
                                    })
                                })
                            </script>
                        @else
                            <div class="row add-schema">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="#schema">Schema</label>
                                        <div class="float-right m-2 test">
                                            <span>Add More</span>
                                            <button type="button" class="btn btn-success" id="add-more"><i class="ti-plus"></i></button>
                                        </div>
                                        <textarea class="form-control" name="category_schema[]"  id="schema" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>




    <script>
        const metaInput = document.querySelectorAll('.meta-input');
        const metaTitle = document.querySelector('.meta-title');
        const metaDescription = document.querySelector('.meta-desc');

        metaInput.forEach( e => {
            e.addEventListener('input', function (e) {
                // console.log(e.target.name);
                if (e.target.name == "meta_title"){
                    metaTitle.textContent = e.target.value.length;
                }
                if (e.target.name == "meta_description"){
                    metaDescription.textContent = e.target.value.length;
                }
            });
        });

        //    SLUG
        // const postSLugInput = document.querySelector('.post-for-slug');
        const postSlug = document.querySelector('.post-slug');

        postSlug.addEventListener('focusout', function (e) {
            let slug =  e.target.value.toString().toLowerCase()
                .replace(/\s+/g, '-')           // Replace spaces with -
                .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
                .replace(/\-\-+/g, '-')         // Replace multiple - with single -
                .replace(/^-+/, '')             // Trim - from start of text
                .replace(/-+$/, '');
            postSlug.value = slug;
        });

        // postSLugInput.addEventListener('input', function (e) {
        //     let actualSlug = e.target.value.split(' ');
        //     postSlug.value =  actualSlug.join('-').toString().toLowerCase()
        //         .replace(/\s+/g, '-')           // Replace spaces with -
        //         .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
        //         .replace(/\-\-+/g, '-')         // Replace multiple - with single -
        //         .replace(/^-+/, '')             // Trim - from start of text
        //         .replace(/-+$/, '');
        // });

        //    Add MORE
        let addMore = document.querySelector('#add-more');
        let append = document.querySelector('.add-schema');


        addMore.addEventListener('click', function (e) {
            e.preventDefault();
            let html = `
                       <div class="row add-schema">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="#schema">Schema</label>
                                    <div class="float-right m-2 test">
                                        <span>Add More</span>
                                        <button type="button" class="btn btn-danger remove_schema"><i class="ti-close"></i></button>
                                    </div>
                                    <textarea class="form-control" name="category_schema[]"  id="schema" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        `;
            append.insertAdjacentHTML('afterend', html);
            let cross = document.querySelector('.remove_schema');
            cross.addEventListener('click', function (e) {
                e.preventDefault();
                e.target.closest('.add-schema').remove();
            })
        });



    </script>
@endsection
