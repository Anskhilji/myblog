@extends('admin.layouts.app')
@section('content')
    <style>
        .todo-list {
            list-style: none outside none;
            margin: 0;
            padding: 0;
            font-size: 13px;
        }
        .todo-list li {
            background: #f3f3f4;
            border-left: 6px solid #e7eaec;
            border-right: 6px solid #e7eaec;
            border-radius: 4px;
            color: inherit;
            margin-bottom: 2px;
            padding: 10px;
            cursor: move;
            cursor: grab;
            cursor: -moz-grab;
            cursor: -webkit-grab;
        }
    </style>

    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="row">
                        <div class="col-md-8 m-auto">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="fs-17 font-weight-600 mb-0">Edit FAQs</h6>
                                        </div>
                                        <div class="text-right">
                                            <div class="actions">
                                                <a href="{{ route('show.faqs') }}" class="btn btn-info float-right">Add FAQs</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="{{ route('faqs.update', $faqs->id) }}">
                                        @csrf
                                        <div class="form-group">
                                            <label class="req">Question</label>
                                            <input type="text" name="question" value="{{ old('question', $faqs->question) }}" class="form-control">
                                            <div class="text-danger">@error('question'){{ $message }}@enderror</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="#PostDetails">Answer<span class="text-danger">*</span></label>
                                            <span class="text-danger">@error('terms_condition_detail'){{$message}}@enderror</span>
                                            <textarea class="form-control oneditor" name="ans" id="oneditor" rows="5" placeholder="Post details...">{!! old('ans', $faqs->ans) !!}</textarea>
                                            <div class="text-danger">@error('ans'){{ $message }}@enderror</div>
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" name="submit" value="Update" class="btn btn-info float-right">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
