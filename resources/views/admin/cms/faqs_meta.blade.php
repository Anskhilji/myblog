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
    </style>

    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <form action="{{ route('store.faqs.schema') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="page_title" value="{{ Request::segment(2) }}">

                        <div class="row">
                            <div class="col-md-12">
                                <label for="#metatitle">Meta Title<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control meta-input" name="meta_title" value="{{ old('meta_title', $faqs->meta_title) }}"  id="metatitle" placeholder="Meta Title">
                                    <span class="input-group-addon meta-title" >{{ strlen($faqs->meta_title) }}</span>
                                </div>
                                <span class="text-danger">@error('meta_title'){{$message}}@enderror</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="#metatitle">Meta Description</label>
                                <div class="input-group">
                                    <textarea class="form-control meta-input" name="meta_description" id="schema" rows="5">{!! old('meta_description', $faqs->meta_description) !!} </textarea>
                                    <span class="input-group-addon meta-desc">{{ strlen($faqs->mete_description) }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="#metatags">Meta Tags</label>
                                <div class="input-group">
                                    <input type="text" class="form-control meta-tags" data-role="tagsinput" name="meta_tags" value="{{ old('meta_tags', $faqs->meta_tags) }}" id="metatags" placeholder="Meta Title">
                                </div>
                            </div>
                        </div>

                        <?php
                        $schema_old = old('faqs_schema') ? old('faqs_schema') : json_decode($faqs->home_schema);
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
                                                <textarea class="form-control" name="faqs_schema[]"  id="schema" rows="5">{!! $value !!}</textarea>
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
                                                <textarea class="form-control" name="faqs_schema[]"  id="schema" rows="5">{!! $value !!}</textarea>
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
                                        <textarea class="form-control" name="faqs_schema[]"  id="schema" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                    @endif

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="uc-image">
                                        <span class="clear-image-x">x</span>
                                        <input type="hidden" name="og_image" value="{{old("og_image", $faqs->og_image)}}">
                                        <div id='og_image' class="image_display">
                                            <img src="{{old("og_image", $faqs->og_image)}}">
                                        </div>
                                        <div style="margin-top:10px;">
                                            <a class="insert-media btn btn-info btn-sm" data-type="image" data-for="display" data-return="#og_image" data-link="og_image">Add Image</a>
                                        </div>
                                    </div>
                                    <span class="text-danger">@error('og_image'){{$message}}@enderror</span>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>

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

        /* Add MORE */
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
                                    <textarea class="form-control" name="faqs_schema[]"  id="schema" rows="5"></textarea>
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
