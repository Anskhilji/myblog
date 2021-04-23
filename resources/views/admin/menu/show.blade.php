@extends('admin.layouts.app')
@section('content')

    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">

                    <div class="page-body">
                        <div class="row">
                                <div class="col-md-4">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <b>Category</b>
                                        </div>
                                        <div class="card-body">
                                            <ul class="menu-cat todo-list m-t ui-sortable" style="margin-top:0px;">
                                                @forelse($categories as $cat)
                                                <li style="cursor:pointer;"
                                                    data-id="{{ $cat->id }}"
                                                    data-title="{{ $cat->category_name }}"
                                                    data-type="category"
                                                    data-link="{{ $cat->slug.'-'.'1'.$cat->id  }}"
                                                    class="menu-added">
                                                    {{ $cat->category_name }}
                                                </li>
                                                @empty
                                                <h3>No Category Found</h3>
                                                @endforelse
                                            </ul>
                                        </div>
                                        <div class="card-header">
                                            <b>Custom Links</b>
                                        </div>
                                        <div class="card-body">
                                            <label>URL</label>
                                            <input type="text" name="url" placeholder="http://" class="form-control"> <br>
                                            <label>Link Text</label>
                                            <input type="text" name="text" class="form-control">
                                            <div class="text-right">
                                                <br>
                                                <button name="add" class="btn btn-info menu-added" data-type="link">Add to Menu</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card">
                                        <form method="post" action="{{ route('store.menu') }}">
                                            @csrf
                                            <div class="card-header">
                                                <div class="pull-right">
                                                    <p class="m-b-lg"><b>Add items from the left column</b>.</p>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="dd" id="nestable">
                                                    <ol class="dd-list main-dd-list">
                                                        @if(!empty($menus_decode))
                                                        @foreach($menus_decode as $menu)
                                                            <li class="dd-item" data-type="{{$menu->type}}" data-title="{{$menu->title}}" data-link="{{ $menu->link }}">
                                                                <div class="dd-handle"> {{ $menu->title }}
                                                                    <span class="menu-del pull-right" data-id="x">x</span>
                                                                    <span class="type pull-right">{{$menu->type}}</span>
                                                                </div>
                                                                @if(!empty($menu->children))
                                                                    @foreach($menu->children as $menu2)
                                                                        <ol class="dd-list">
                                                                            <li class="dd-item" data-type="{{$menu2->type}}" data-title="{{$menu2->title}}" data-link="{{ $menu2->link }}">
                                                                                <div class="dd-handle"> {{ $menu2->title }}
                                                                                    <span class="menu-del pull-right" data-id="x">x</span>
                                                                                    <span class="type pull-right">{{$menu2->type}}</span>
                                                                                </div>
                                                                                @if(!empty($menu2->children))
                                                                                    @foreach($menu2->children as $menu3)
                                                                                        <ol class="dd-list">
                                                                                            <li class="dd-item" data-type="{{$menu3->type}}" data-title="{{$menu3->title}}" data-link="{{ $menu3->link }}">
                                                                                                <div class="dd-handle"> {{ $menu3->title }}
                                                                                                    <span class="menu-del pull-right" data-id="x">x</span>
                                                                                                    <span class="type pull-right">{{$menu3->type}}</span>
                                                                                                </div>
                                                                                            </li>
                                                                                    @endforeach
                                                                                @endif
                                                                            </li>
                                                                        </ol>
                                                                    @endforeach
                                                                    @endif
                                                            </li>
                                                            @endforeach
                                                        @else
                                                            <h3>No Category!</h3>
                                                        @endif

                                                    </ol>
                                                </div>
                                                <div class="text-right" style="margin-top:25px;">
                                                    <textarea id="nestable-output" name="data" style="display:none;"></textarea>
                                                    <button class="btn btn-info save-menu" type="submit" name="save">Save Menu</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>

@endsection

