@extends('frontend.layouts.app')

@section('content')

                <!--Form Column-->
                <div class="form-column col-lg-8 m-auto col-md-12 col-sm-12">
                    @if(Session::has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <p>{{ Session::get('message') }}</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="sec-title">
                        <h2>Contact Form</h2>
                    </div>
                    <!--Contact Form-->
                    <div class="contact-form">
                        <form method="post" action="{{ route('contact-us-message') }}" id="contact-form">
                            @csrf
                            <div class="clearfix">
                                <div class="form-group">
                                    <input type="text" name="name" value="" placeholder="Name ..." required>
                                    <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" value="" placeholder="Email ..." required>
                                    <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                                </div>
                                <div class="form-group">
                                    <textarea name="message" placeholder="Message ..."></textarea>
                                    <span class="text-danger">@error('message'){{ $message }}@enderror</span>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="theme-btn submit-btn">Submit Comment</button>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>



<!--End pagewrapper-->


@endsection
