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
    @php
    $cat = explode(',',$posts->category_id);
    @endphp
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <form action="{{ route('update.post', $posts->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="old_post_cover_image" value="{{ $posts->post_cover_image }}">
                        <input type="hidden" name="old_post_og_image" value="{{ $posts->post_og_image }}">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="#postcategory">Category<span class="text-danger">*</span></label>
                                <select class="js-example-placeholder-multiple col-sm-12" name="category_id[]" id="postcategory" multiple="multiple">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{(!empty(old('category_id')) && in_array($category->id,old('category_id')))?"selected":""}}
                                            {{ in_array($category->id,$cat) ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('category_id'){{$message}}@enderror</span>

                            </div>
                            <div class="col-md-6">
                                <label for="#posttitle">Post Title<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" name="post_title" value="{{old('post_title',$posts->post_title)}}" class="form-control" id="posttitle" placeholder="Post Title">
                                </div>
                                <span class="text-danger">@error('post_title'){{$message}}@enderror</span>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="#postslug">Slug<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" name="slug" value="{{ old('slug', $posts->slug) }}" class="form-control post-slug" id="postslug" placeholder="Slug">
                                </div>
                                <span class="text-danger">@error('slug'){{$message}}@enderror</span>
                            </div>
                            <div class="col-md-6">
                                <label for="#metatitle">Meta Title<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control meta-input" name="meta_title" value="{{ old('meta_title', $posts->meta_title) }}"  id="metatitle" placeholder="Meta Title">
                                    <span class="input-group-addon meta-title" >0</span>
                                </div>
                                <span class="text-danger">@error('meta_title'){{$message}}@enderror</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="#metatitle">Meta Description</label>
                                <div class="input-group">

                                    <textarea class="form-control meta-input" name="meta_description" id="schema" rows="5">{!! old('meta_description', $posts->meta_description) !!}</textarea>
                                    <span class="input-group-addon meta-desc" >0</span>
                                </div>
                                <span class="text-danger">@error('meta_description'){{$message}}@enderror</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="#metatags">Meta Tags</label>
                                <div class="input-group">
                                    <input type="text" class="form-control meta-tags" data-role="tagsinput" name="meta_tags" value="{{ old('meta_tags', $posts->meta_tags) }}" id="metatags" placeholder="Meta Title">
                                </div>
                                <span class="text-danger">@error('meta_tags'){{$message}}@enderror</span>

                            </div>
                        </div>




                        <?php
                        $schema_old = old('post_schema')?old('post_schema'):json_decode($posts->post_schema);
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
                                                <textarea class="form-control" name="post_schema[]"  id="schema" rows="5">{!! $value !!}</textarea>
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
                                                <textarea class="form-control" name="post_schema[]"  id="schema" rows="5">{!! $value !!}</textarea>
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
                                        <textarea class="form-control" name="post_schema[]"  id="schema" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="#PostDetails">Post Detail<span class="text-danger">*</span></label>
                                    <textarea class="form-control oneditor" name="post_detail" id="PostDetails" rows="5" placeholder="Post details...">{!! old('post_detail', $posts->post_detail) !!}</textarea>
                                </div>
                                <span class="text-danger">@error('post_detail'){{$message}}@enderror</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="#coverImage">Cover Image</label>
                                    <input type="file" class="form-control" name="post_cover_image" id="coverImage" onchange="readURL(this)">
                                    <div class="text-danger">@error('post_cover_image'){{$message}}@enderror</div>
                                    <img src="#" id="one" alt="">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div>
                                        <img src="{{ asset($posts->post_cover_image) }}" width="100" height="100" alt="old_cover_image">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="#ogimage">OG Image</label>
                                    <input type="file" class="form-control" name="post_og_image" id="ogimage" onchange="readURL2(this)">
                                    <div class="text-danger">@error('post_og_image'){{$message}}@enderror</div>
                                    <img src="#" id="two" alt="">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    @if($posts->post_og_image == null)
                                        <p>
                                            <h3>There is no OG Image.</h3>
                                        </p>
                                    @else
                                        <div>
                                            <img src="{{ asset($posts->post_og_image) }}" width="100" height="100" alt="old_cover_image">
                                        </div>
                                    @endif
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-4 m-b-30">
                            <label for="#checked" class="check-status">Publish</label>
                            <input type="checkbox" class="js-single" id="checked" value="1" {{ $posts->post_status == 1 ? 'checked' : '' }} name="post_status">
                        </div>
                        <div class="row">
                            <button type="submit" class="btn btn-primary ml-4">Submit</button>
                        </div>
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
                                    <textarea class="form-control" name="post_schema[]"  id="schema" rows="5"></textarea>
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

        $checked = document.querySelector('#checked');
        $checkStatus = document.querySelector('.check-status');

        $checked.addEventListener('change', function (){
            if ($checked.checked == true){
                $checkStatus.textContent = 'Publish';
            }else{
                $checkStatus.textContent = 'Draft';
            }
        });
    </script>
@endsection
