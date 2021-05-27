@extends('admin.layouts.app')
@section('content')
    <style>
        .bootstrap-tagsinput{
            width: 1100px !important;
        }
        .input-group {
            margin-bottom: 0px !important;
        }

        .close-image-x, .clear-image-x {
            position: absolute;
            right: -10px;
            padding: 5px;
            background-color: #C00;
            border-radius: 100%;
            color: #FFF;
            cursor: pointer;
            top: -9px;
            width: 27px;
            z-index: 8;
        }
        .uc-image {
            border: 1px solid;
            width: 97%;
            height: 160px;
            display: inline-block;
            vertical-align: middle;
            margin: 4px;
            text-align: center;
            padding: 5px;
            position: relative;
        }
        .image_display {
            display: flex;
            justify-content: center;
        }
        .image_display img {
            max-width: 100%;
            height: 100px;
        }
        .hidden {
            display: none;
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
                                <label for="#author">Author<span class="text-danger">*</span></label>
                                <select name="author" class="form-control form-control-default">
                                    <option selected disabled>Please Select Author</option>
                                    @forelse($authors as $author)
                                        <option value="{{ $author->id }}" {{ $posts->author_id == $author->id ? 'selected' : '' }} >{{ $author->name }}</option>
                                    @empty
                                        <p>No Author Found</p>
                                    @endforelse
                                </select>
                                <span class="text-danger">@error('author'){{$message}}@enderror</span>

                            </div>


                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="#posttitle">Post Title<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" name="post_title" value="{{old('post_title',$posts->post_title)}}" class="form-control" id="posttitle" placeholder="Post Title">
                                </div>
                                <span class="text-danger">@error('post_title'){{$message}}@enderror</span>
                            </div>
                            <div class="col-md-6">
                                <label for="#postslug">Slug<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" name="slug" value="{{ old('slug', $posts->slug) }}" class="form-control post-slug" id="postslug" placeholder="Slug">
                                </div>
                                <span class="text-danger">@error('slug'){{$message}}@enderror</span>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="#metatitle">Meta Title<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control meta-input" name="meta_title" value="{{ old('meta_title', $posts->meta_title) }}"  id="metatitle" placeholder="Meta Title">
                                    <span class="input-group-addon meta-title" >{{ strlen($posts->meta_title) }}</span>
                                </div>
                                <span class="text-danger">@error('meta_title'){{$message}}@enderror</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="#metatitle">Meta Description</label>
                                <div class="input-group">

                                    <textarea class="form-control meta-input" name="meta_description" id="schema" rows="5">{!! old('meta_description', $posts->meta_description) !!}</textarea>
                                    <span class="input-group-addon meta-desc" >{{ strlen($posts->meta_description) }}</span>
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

                        {{--Green Text--}}
                        <?php
                        $db_green = collect(json_decode($posts->green_text, true));
                        $count  =  count($db_green[0]);
                        for ($i=0; $i<$count; $i++){
                            $g_arr[] =$db_green->pluck($i);
                        }

                        $green_heading = old('green_heading') ? old('green_heading') : $g_arr[0];
                        $green_body = old('green_body') ? old('green_body') : $g_arr[1];
                        ?>
                        @if(!empty($green_heading) and count($green_heading) > 0)
                            <?php
                            $green_text = collect([$green_heading,$green_body]);
                            $count = count($green_text[0]);
                            for ($i=0; $i<$count; $i++){
                                $green_arr[] = $green_text->pluck($i);
                            }
                            ?>
                            <div class="row p-0 m-0">
                                <div class="col-md-12">
                                    <div class="row" style="border: 1px solid rgba(0,0,0,.125);">
                                        <div class="w-100 p-0 m-0 default-green">
                                            <div style="background: green; width: 100%; display: flex; justify-content: center; align-items: center">
                                                <p style="color: white; font-size: 18px; margin-top: 10px;     margin-block-start: 5px; margin-block-end: 5px;">Green Text</p>
                                            </div>
                                            @foreach($green_arr as $key => $val)
                                                @if($key == 0)
                                                    <div class="w-100">
                                                        <div class="row m-4 p-4" style="border: 2px solid #90949882;">
                                                            <p style="text-align: center; width: 100%; font-size: 14px; font-weight: bold;">Green Text 1</p>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="#GreenHeading">Heading</label>
                                                                    <input type="text" class="form-control" name="green_heading[]" value="{{ $val[0] }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="#GreenBody">Body</label>
                                                                    <textarea class="form-control oneditor" name="green_body[]" rows="5">{!! $val[1] !!}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="row m-4 green-text" style="border: 2px solid #90949882;">
                                                        <div style="width: 100%; padding: 0px; margin: 0px; display: flex; justify-content: flex-end">
                                                            <i class="fa fa-times text-white close" aria-hidden="true" style="cursor: pointer; background: red; padding: 7px 10px; margin: 0"></i>
                                                        </div>
                                                        <p style="text-align: center; width: 100%; font-size: 14px; font-weight: bold;">Green Text
                                                            <span class="count">2</span></p>
                                                        <div class="col-md-12  pl-4 pr-4 pb-4">
                                                            <div class="form-group mb-0">
                                                                <label for="#PostDetails">Heading</label>
                                                                <input type="text" class="form-control" name="green_heading[]" value="{{ $val[0] }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12  pl-4 pr-4 pb-4">
                                                            <div class="form-group mb-0">
                                                                <label for="#PostDetails">Body</label>
                                                                <textarea class="form-control oneditor" name="green_body[]" rows="5" placeholder="Post details...">{!! $val[1] !!}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach

                                        </div>
                                        <div class="d-flex justify-content-end mr-4 mb-4" style="width: 100%;">
                                            <input type="button" class="btn btn-info add_green" value="Add More">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                let greenTextRemove = document.querySelectorAll('.close');
                                var count = document.querySelectorAll('.count');

                                greenTextRemove.forEach(e => {
                                    e.addEventListener('click', function (e) {
                                        e.preventDefault();
                                        e.target.closest('.green-text').remove();
                                    });
                                })
                                var n = 2;
                                count.forEach(el => {
                                    el.textContent = n;
                                    n++;
                                });
                            </script>
                        @else
                            <div class="row p-0 m-0">
                                <div class="col-md-12">
                                    <div class="row" style="border: 1px solid rgba(0,0,0,.125);">
                                        <div class="w-100 p-0 m-0 default-green">
                                            <div class="w-100">
                                                <div style="background: green; width: 100%; display: flex; justify-content: center; align-items: center">
                                                    <p style="color: white; font-size: 18px; margin-top: 10px;     margin-block-start: 5px; margin-block-end: 5px;">Green Text</p>
                                                </div>
                                                <div class="w-100">
                                                    <div class="row m-4 p-4" style="border: 2px solid #90949882;">
                                                        <p style="text-align: center; width: 100%; font-size: 14px; font-weight: bold;">Green Text 1</p>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="#GreenHeading">Heading</label>
                                                                <input type="text" class="form-control" name="green_heading[]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="#GreenBody">Body</label>
                                                                <textarea class="form-control oneditor" name="green_body[]" rows="5"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-end mr-4 mb-4" style="width: 100%;">
                                            <input type="button" class="btn btn-info add_green" value="Add More">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{--End Green Text--}}

                        {{--Red Text--}}
                        <?php
                        $db_red = collect(json_decode($posts->red_text, true));
                        $count  =  count($db_red[0]);
                        for ($i=0; $i<$count; $i++){
                            $r_arr[] =$db_red->pluck($i);
                        }
                        $red_heading = old('red_heading') ? old('red_heading') : $r_arr[0];
                        $red_body = old('red_body') ? old('red_body') : $r_arr[1];
                        ?>
                        @if(!empty($red_heading) and count($red_heading) > 0)
                            <?php

                            $red_text = collect([$red_heading,$red_body]);
                            $count = count($red_text[0]);
                            for ($i=0; $i<$count; $i++){
                                $red_arr[] =$red_text->pluck($i);
                            }
                            // d($red_arr);
                            ?>
                            <div class="row p-0 m-0 mt-4">
                                <div class="col-md-12">
                                    <div class="row" style="border: 1px solid rgba(0,0,0,.125);">
                                        <div style="background: red; width: 100%; display: flex; justify-content: center; align-items: center">
                                            <p style="color: white; font-size: 18px; margin-top: 10px;
                                        margin-block-start: 5px; margin-block-end: 5px;">Red Text</p>
                                        </div>
                                        <div class="w-100 default-red">
                                            @foreach($red_arr as $key => $val)
                                                @if($key == 0)
                                                    <div class="row m-4 p-4" style="border: 2px solid #90949882;">
                                                        <p style="text-align: center; width: 100%; font-size: 14px; font-weight: bold;">Red Text 1</p>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="#RedHeading">Heading</label>
                                                                <input type="text" class="form-control" name="red_heading[]" value="{{ $val[0] }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="#RedBody">Body</label>
                                                                <textarea class="form-control oneditor" name="red_body[]" rows="5">{!! $val[1] !!}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="row m-4 red-text" style="border: 2px solid #90949882;">
                                                        <div style="width: 100%; padding: 0px; margin: 0px; display: flex; justify-content: flex-end">
                                                            <i class="fa fa-times text-white close-red" aria-hidden="true" style="cursor: pointer; background: red; padding: 7px 10px; margin: 0"></i>
                                                        </div>
                                                        <p style="text-align: center; width: 100%; font-size: 14px; font-weight: bold;">Red Text
                                                            <span class="count-red">2</span></p>
                                                        <div class="col-md-12  pl-4 pr-4 pb-4">
                                                            <div class="form-group mb-0">
                                                                <label for="#RedHeading">Heading</label>
                                                                <input type="text" class="form-control" name="red_heading[]" value="{{ $val[0] }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12  pl-4 pr-4 pb-4">
                                                            <div class="form-group mb-0">
                                                                <label for="#RedBody">Body</label>
                                                                <textarea class="form-control oneditor" name="red_body[]" rows="5" placeholder="Post details...">{!! $val[1] !!}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>

                                        <div class="d-flex justify-content-end mr-4 mb-4" style="width: 100%;">
                                            <input type="button" class="btn btn-info add_red" value="Add More">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                let redTextRemove = document.querySelectorAll('.close-red');
                                var countRed = document.querySelectorAll('.count-red');
                                redTextRemove.forEach(e => {
                                    e.addEventListener('click', function (e) {
                                        e.preventDefault();
                                        e.target.closest('.red-text').remove();
                                    });
                                })
                                var n = 2;
                                countRed.forEach(el => {
                                    el.textContent = n;
                                    n++;
                                });
                            </script>
                        @else
                            <div class="row p-0 m-0 mt-4">
                                <div class="col-md-12">
                                    <div class="row" style="border: 1px solid rgba(0,0,0,.125);">
                                        <div style="background: red; width: 100%; display: flex; justify-content: center; align-items: center">
                                            <p style="color: white; font-size: 18px; margin-top: 10px;
                                        margin-block-start: 5px; margin-block-end: 5px;">Red Text</p>
                                        </div>
                                        <div class="w-100 default-red">
                                            <div class="row m-4 p-4" style="border: 2px solid #90949882;">
                                                <p style="text-align: center; width: 100%; font-size: 14px; font-weight: bold;">Red Text 1</p>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="#RedHeading">Heading</label>
                                                        <input type="text" class="form-control" name="red_heading[]">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="#RedBody">Body</label>
                                                        <textarea class="form-control oneditor" name="red_body[]" rows="5"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-end mr-4 mb-4" style="width: 100%;">
                                            <input type="button" class="btn btn-info add_red" value="Add More">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{-- End Red Text--}}


                        {{--Black Text--}}
                        <?php
                        $db_black = collect(json_decode($posts->black_text, true));
                        $count  =  count($db_black[0]);
                        for ($i=0; $i<$count; $i++){
                            $b_arr[] =$db_black->pluck($i);
                        }
                        $black_heading = old('black_heading') ? old('black_heading') : $b_arr[0] ;
                        $black_body = old('black_body') ? old('black_body') : $b_arr[0];
                        ?>
                        @if(!empty($black_heading) and count($black_heading) > 0)
                            <?php
                            $black_text = collect([$black_heading,$black_body]);
                            $count = count($black_text[0]);
                            for ($i=0; $i<$count; $i++){
                                $black_arr[] =$black_text->pluck($i);
                            }
                            // d($black_arr);
                            ?>
                            <div class="row p-0 m-0 mt-4">
                                <div class="col-md-12">
                                    <div class="row" style="border: 1px solid rgba(0,0,0,.125);">
                                        <div style="background: black; width: 100%; display: flex; justify-content: center; align-items: center">
                                            <p style="color: white; font-size: 18px; margin-top: 10px;
                                        margin-block-start: 5px; margin-block-end: 5px;">Black Text</p>
                                        </div>
                                        <div class="w-100 default-black">
                                            @foreach($black_arr as $key => $val)
                                                @if($key == 0)
                                                    <div class="row m-4 p-4" style="border: 2px solid #90949882;">
                                                        <p style="text-align: center; width: 100%; font-size: 14px; font-weight: bold;">Black Text 1</p>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="#BlackHeading">Heading</label>
                                                                <input type="text" class="form-control" name="black_heading[]" value="{{ $val[0] }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="#BlackBody">Body</label>
                                                                <textarea class="form-control oneditor" name="black_body[]" rows="5">{!! $val[1] !!}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="row m-4 black-text" style="border: 2px solid #90949882;">
                                                        <div style="width: 100%; padding: 0px; margin: 0px; display: flex; justify-content: flex-end">
                                                            <i class="fa fa-times text-white close-black" aria-hidden="true" style="cursor: pointer; background: red; padding: 7px 10px; margin: 0"></i>
                                                        </div>
                                                        <p style="text-align: center; width: 100%; font-size: 14px; font-weight: bold;">Black Text
                                                            <span class="count-black">2</span></p>
                                                        <div class="col-md-12  pl-4 pr-4 pb-4">
                                                            <div class="form-group mb-0">
                                                                <label for="#RedHeading">Heading</label>
                                                                <input type="text" class="form-control" name="black_heading[]" value="{{ $val[0] }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12  pl-4 pr-4 pb-4">
                                                            <div class="form-group mb-0">
                                                                <label for="#RedBody">Body</label>
                                                                <textarea class="form-control oneditor" name="black_body[]" rows="5">{!! $val[1] !!}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="d-flex justify-content-end mr-4 mb-4" style="width: 100%;">
                                            <input type="button" class="btn btn-info add_black" value="Add More">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                let blackTextRemove = document.querySelectorAll('.close-black');
                                var countBlack = document.querySelectorAll('.count-black');
                                blackTextRemove.forEach(e => {
                                    e.addEventListener('click', function (e) {
                                        e.preventDefault();
                                        e.target.closest('.black-text').remove();
                                    });
                                })
                                var n = 2;
                                countBlack.forEach(el => {
                                    el.textContent = n;
                                    n++;
                                });
                            </script>
                        @else
                            <div class="row p-0 m-0 mt-4">
                                <div class="col-md-12">
                                    <div class="row" style="border: 1px solid rgba(0,0,0,.125);">
                                        <div style="background: black; width: 100%; display: flex; justify-content: center; align-items: center">
                                            <p style="color: white; font-size: 18px; margin-top: 10px;
                                        margin-block-start: 5px; margin-block-end: 5px;">Black Text</p>
                                        </div>
                                        <div class="w-100 default-black">
                                            <div class="row m-4 p-4" style="border: 2px solid #90949882;">
                                                <p style="text-align: center; width: 100%; font-size: 14px; font-weight: bold;">Black Text 1</p>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="#BlackHeading">Heading</label>
                                                        <input type="text" class="form-control" name="black_heading[]">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="#BlackBody">Body</label>
                                                        <textarea class="form-control oneditor" name="black_body[]" rows="5"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-end mr-4 mb-4" style="width: 100%;">
                                            <input type="button" class="btn btn-info add_black" value="Add More">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endif
                        {{--End Black Text--}}

                        {{-- start internal links multi tags input--}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="#PostDetails">Internal Links</label>
                                    <input id="input" type="text" data-role="tagsinput" name="internal_links" value="{{ old('internal_links', $posts->internal_tags) }}" class="form-control" />
                                </div>
                            </div>
                        </div>
                        {{--     End internal links multi tags input--}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="#PostDetails">Post Detail<span class="text-danger">*</span></label>
                                    <div>
                                        <a class="insert-media btn btn-primary btn-sm text-white"
                                           data-type="image" data-for="editor"
                                           data-return="#oneditor" data-link="image">Add Image
                                        </a>
                                        <a type="button" class="btn btn-info btn-sm float-right text-white"
                                           data-toggle="modal" data-target="#shortcode-model">
                                            <i class="fa fa-info"></i> &nbsp; Short Codes Discription
                                        </a>
                                    </div>
                                    <textarea class="form-control oneditor" name="post_detail" id="oneditor" rows="20" placeholder="Post details...">{!! old('post_detail', $posts->post_detail) !!}</textarea>
                                </div>
                                <span class="text-danger">@error('post_detail'){{$message}}@enderror</span>
                            </div>
                        </div>

                        {{--Faqs--}}
                        <?php
                        $db_faqs = collect(json_decode($posts->faqs, true));
                        $count  =  count($db_faqs[0]);
                        for ($i=0; $i<$count; $i++){
                            $faq_arr[] =$db_faqs->pluck($i);
                        }

                        $faqs_question = old('faqs_question') ? old('faqs_question') : $faq_arr[0];
                        $faqs_answer = old('faqs_answer') ? old('faqs_answer') : $faq_arr[1];
                        ?>
                        @if(!empty($faqs_question) and count($faqs_question) > 0)
                            <?php
                            $faqs = collect([$faqs_question,$faqs_answer]);
                            $count = count($faqs[0]);
                            for ($i=0; $i<$count; $i++){
                                $faqs_arr[] =$faqs->pluck($i);
                            }
                            // d($faqs_arr);
                            ?>
                            <div class="row p-0 m-0 mt-4 mb-4">
                                <div class="col-md-12">
                                    <div class="row" style="border: 1px solid rgba(0,0,0,.125);">
                                        <div style="background: #17A2B8; width: 100%; display: flex; justify-content: center; align-items: center">
                                            <p style="color: white; font-size: 18px; margin-top: 10px;
                                    margin-block-start: 5px; margin-block-end: 5px;">Blog Faqs</p>
                                        </div>
                                        <div class="w-100 default-faqs">
                                            @foreach($faqs_arr as $key => $val)
                                                @if($key == 0)
                                                    <div class="row m-4 p-4" style="border: 2px solid #90949882;">
                                                        <p style="text-align: center; width: 100%; font-size: 14px; font-weight: bold;">FAQs 1</p>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="#Question">Question</label>
                                                                <input type="text" class="form-control" name="faqs_question[]" value="{{ $val[0] }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="#Answer">Answer</label>
                                                                <textarea class="form-control oneditor" name="faqs_answer[]" rows="5">{!! $val[1] !!}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="row m-4 faqs" style="border: 2px solid #90949882;">
                                                        <div style="width: 100%; padding: 0px; margin: 0px; display: flex; justify-content: flex-end">
                                                            <i class="fa fa-times text-white close-faqs" aria-hidden="true" style="cursor: pointer; background: red; padding: 7px 10px; margin: 0"></i>
                                                        </div>
                                                        <p style="text-align: center; width: 100%; font-size: 14px; font-weight: bold;">Faqs
                                                            <span class="count-faqs">2</span></p>
                                                        <div class="col-md-12  pl-4 pr-4 pb-4">
                                                            <div class="form-group mb-0">
                                                                <label for="#Question">Question</label>
                                                                <input type="text" class="form-control" name="faqs_question[]" value="{{ $val[0] }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12  pl-4 pr-4 pb-4">
                                                            <div class="form-group mb-0">
                                                                <label for="#Answer">Answer</label>
                                                                <textarea class="form-control oneditor" name="faqs_answer[]" rows="5">{!! $val[1] !!}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>

                                        <div class="d-flex justify-content-end mr-4 mb-4" style="width: 100%;">
                                            <input type="button" class="btn btn-info add_faqs" value="Add More">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                let faqsRemove = document.querySelectorAll('.close-faqs');
                                var countFaqs = document.querySelectorAll('.count-faqs');
                                faqsRemove.forEach(e => {
                                    e.addEventListener('click', function (e) {
                                        e.preventDefault();
                                        e.target.closest('.faqs').remove();
                                    });
                                })
                                var n = 2;
                                countFaqs.forEach(el => {
                                    el.textContent = n;
                                    n++;
                                });
                            </script>
                        @else
                            <div class="row p-0 m-0 mt-4">
                                <div class="col-md-12">
                                    <div class="row" style="border: 1px solid rgba(0,0,0,.125);">
                                        <div style="background: #17A2B8; width: 100%; display: flex; justify-content: center; align-items: center">
                                            <p style="color: white; font-size: 18px; margin-top: 10px;
                                        margin-block-start: 5px; margin-block-end: 5px;">Blog Faqs</p>
                                        </div>
                                        <div class="w-100 default-faqs">
                                            <div class="row m-4 p-4" style="border: 2px solid #90949882;">
                                                <p style="text-align: center; width: 100%; font-size: 14px; font-weight: bold;">FAQs 1</p>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="#Question">Question</label>
                                                        <input type="text" class="form-control" name="faqs_question[]">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="#Answer">Answer</label>
                                                        <textarea class="form-control oneditor" name="faqs_answer[]" rows="5"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-end mr-4 mb-4" style="width: 100%;">
                                            <input type="button" class="btn btn-info add_faqs" value="Add More">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        {{--End Faqs--}}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group col-lg-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header card bg-secondary text-white">
                                            <b> Cover Image <small> 370 x 215</small></b>
                                        </div>
                                        <div class="card-body">
                                            <div class="uc-image">
                                                <span class="clear-image-x">x</span>
                                                <input type="hidden" name="cover-image" value="{{$posts->post_cover_image}}">
                                                <div id='cover' class="image_display"><img src="{{$posts->post_cover_image}}"></div>
                                                <div style="margin-top:10px;">
                                                    <a class="insert-media btn btn-info btn-sm" data-type="image" data-for="display" data-return="#cover" data-link="cover-image">Add Image</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-danger">@error('cover-image'){{$message}}@enderror</div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group col-lg-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header card bg-secondary text-white">
                                            <b> OG Image <small> 370 x 215</small></b>
                                        </div>
                                        <div class="card-body">
                                            <div class="uc-image">
                                                <span class="clear-image-x">x</span>
                                                <input type="hidden" name="og-image" value="{{ $posts->post_og_image }}">
                                                <div id='og_image' class="image_display">
                                                    <img src="{{ $posts->post_og_image }}">
                                                </div>
                                                <div style="margin-top:10px;">
                                                    <a class="insert-media btn btn-info btn-sm" data-type="image" data-for="display" data-return="#og_image" data-link="og-image">Add Image</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
{{--    Model For Short Code --}}
    <div class="modal fade show " id="shortcode-model" role="dialog" aria-modal="true">
        <div class="modal-dialog" style="min-width:95%">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Description For Short Codes</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body table-responsive" >
                    <table class="table" style="font-size: 12px">
                        <tbody><tr>
                            <th>#</th>
                            <th>Name</th>
                            <th> Short Code</th>
                            <th> Description</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td> Related Post: </td>
                            <td> [[related:2]] </td>
                            <td> [[related : Limits of url / Quantity]] <br> <b>For Example : [[related : 2]] </b> 2 Links will Generate where we use this code </td>
                        </tr>
                        <tr>
                            <td> 2 </td>
                            <td> Ads In Article:</td>
                            <td> [[ads:2]] </td>
                            <td> [[ads : index of Ad that shown in article]] <br> <b>For Example : [[ads : 2]] </b> 2nd Ad will shown where we use this code </td>
                        </tr>
                        <tr>
                            <td> 3 </td>
                            <td> Table of Content:</td>
                            <td> [[toc]] </td>
                            <td> use this code <b>[[toc]]</b> where u want to show table of content in article</td>
                        </tr>
                        <tr>
                            <td> 4 </td>
                            <td> Heading:</td>
                            <td> [[t]] Heading [[/t]] </td>
                            <td> <b>Example</b> Heading no 1 : [[t1]]Heading no 1[[/t1]] <br> Heading no 2 : [[t2]]Heading no 2[[/t2]] </td>
                        </tr>
                        <tr>
                            <td> 5 </td>
                            <td> Sub Heading:</td>
                            <td> [[t1-s1]] Sub Heading of Headin 1 [[/t1-s1]] </td>
                            <td> <b>Example</b> <b>1st Sub Heading of Heading 1 </b>: [[t1-s1]]1st Sub Heading of Heading 1[[/t1-s2]] <br> <b>2nd Sub Heading of Heading 1 </b>: [[t1-s2]]2nd Sub Heading of Heading 1[[/t1-s2]] </td>
                        </tr>
                        <tr>
                            <td> 6 </td>
                            <td> Child of Sub Heading:</td>
                            <td> [[t1-s1-c1]] chlid of1st Sub Heading of Headin 1 [[/t1-s1-c1]] </td>
                            <td> <b>Example</b> <b>Child of 1st Sub Heading of Heading 1 </b>: [[t1-s1-c1]] Child of 1st Sub Heading of Heading 1[[/t1-s1-c1]] </td>
                        </tr>
                        <tr>
                            <td> 7 </td>
                            <td> Green Text:</td>
                            <td> [[green:2]] </td>
                            <td> [[green : index of Green Text that is listed above]] <br> <b>For Example : [[green : 2]] </b> 2nd Green text will shown where we use this code </td>
                        </tr>
                        <tr>
                            <td> 8 </td>
                            <td> Red Text:</td>
                            <td> [[red:2]] </td>
                            <td> [[red : index of Red Text that is listed above]] <br> <b>For Example : [[Red : 2]] </b> 2nd Red text will shown where we use this code </td>
                        </tr>
                        <tr>
                            <td> 9 </td>
                            <td> black Text:</td>
                            <td> [[black:2]] </td>
                            <td> [[black : index of Black Text that is listed above]] <br> <b>For Example : [[Black : 2]] </b> 2nd Green text will shown where we use this code </td>
                        </tr>
                        <tr>
                            <td> 10 </td>
                            <td> Faqs </td>
                            <td> [[faqs:index of FAQs that is listed above]] </td>
                            <td> <b>Example</b> <b>[[faqs:1-4]]</b> place this code if u want to show faqs no 1 2 3 and 4
                                <br> <b>[[faqs:1,3,5,7]]</b> place this code if u want to show randomly faqs for example 1 3 5 7 </td>
                        </tr>
                        </tbody></table>
                </div>
            </div>
        </div>
    </div>
    {{--   End Model For Short Code --}}

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
