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
                        <div class="col-md-6 col-lg-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="fs-17 font-weight-600 mb-0">Add FAQs</h6>
                                        </div>
                                        <div class="text-right">
                                            <div class="actions">
                                                <a href="{{ route('faqs.meta') }}" class="btn btn-info float-right">FAQs Meta Settings</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="{{ route('faqs.store') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label class="req">Question</label>
                                            <input type="text" name="question" value="{{ old('question') }}" class="form-control">
                                            <div class="text-danger">@error('question'){{ $message }}@enderror</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="#PostDetails">Answer<span class="text-danger">*</span></label>
                                            <span class="text-danger">@error('terms_condition_detail'){{$message}}@enderror</span>
                                            <textarea class="form-control oneditor" name="ans" id="oneditor" rows="5" placeholder="Post details...">{!! old('ans') !!}</textarea>
                                            <div class="text-danger">@error('ans'){{ $message }}@enderror</div>
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" name="submit" value="Save" class="btn btn-info float-right">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="fs-17 font-weight-600 mb-0">FAQs List For Order</h6>
                                        </div>
                                        <div class="text-right">
                                            <div class="actions">
                                                <a href="{{ route('faqs.list') }}" class="btn btn-info">View All Faqs</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <form action="{{ route('faqs.order.store') }}" method="post">
                                        @csrf					<div class="row">
                                            <div class="col-lg-12 col-sm-12 col-lg-offset-1">
                                                <h3>Please Select Order</h3>
                                                <div class="form-group">
                                                    <ol id="sortable" class="m-tbc todo-list msortable ui-sortable">
                                                    @forelse($faqs as $faq)
                                                        <li title="" class="ui-sortable-handle" style="">
                                                            <input type="hidden" name="order[]" value="{{ $faq->id }}" class="form-control">
                                                            {{ $faq->question }}
                                                        </li>
                                                    @empty
                                                            <li title="" class="ui-sortable-handle" style="">
                                                               No Faqs Available
                                                            </li>
                                                    @endforelse

                                                    </ol>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" name="submit" value="submit" class="btn btn-info float-right">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
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
