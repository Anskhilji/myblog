@extends('admin.layouts.app')
@section('content')

    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">

                    <div class="page-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-10">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="mb-0" style="font-size: 17px!important; font-weight: 600">Internal Link Settings</h6>
                                            </div>
                                            <div class="text-right">
                                                <div class="actions">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="{{ route('internal.links.store') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label>Target</label><br>
                                                <select class="form-control" name="target">
                                                    <option value="">Select</option>
                                                    <option value="_blank" {{ $links->target == '_blank' ? "selected" : "" }}>New Window</option>
                                                    <option value="_self" {{ $links->target == '_self' ? "selected" : "" }}>Same Window</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Type of links</label><br>
                                                <select class="form-control" name="type">
                                                    <option value="">Select</option>
                                                    <option value="nofollow" {{ $links->types_of_links == 'nofollow' ? "selected" : '' }}>No Follow</option>
                                                    <option value="" {{ $links->types_of_links == '' ? "selected" : "" }}>Do Follow</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Max No. of Internal Links in one article</label><br>
                                                <div class="input-group">
                                                    <input type="number" max="" min="1" value="{{ $links->max_links_in_one_article }}" name="max" class="form-control">
                                                    <span class="input-group-addon">
                                                  <label><input type="radio" value="fixed" name="fx" {{ $links->fixed_percent ==  'fixed' ? 'checked' : ''}}> Fixed </label>
                                                  <label><input type="radio" value="per" name="fx" {{ $links->fixed_percent ==  'per' ? 'checked' : ''}}> % </label>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Maximum Number of Links of the One Article </label><br>
                                                <input type="number" max="" min="1" value="{{ $links->max_links_limit }}" name="max_1" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label>Maximum No of Links of 1 article on the same anchor text: </label><br>
                                                <input type="number" max="" min="1" value="{{ $links->max_links_on_same_anchor_text }}" name="max_p" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label>Maximum Number of Links of 1 article on different anchor text: </label><br>
                                                <input type="number" max="" min="1" value="{{ $links->max_links_on_different_anchor_text }}" name="max_d" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label>Maximum Number of Links of its own Article </label><br>
                                                <input type="number" max="" min="1" value="{{ $links->max_links_on_its_own_article }}" name="max_s" class="form-control">
                                            </div>

                                            <div class="form-group" style="text-align:right;">
                                                <input type="submit" name="submit" value="Update" class="btn btn-primary">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


@endsection
