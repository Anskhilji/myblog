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

        .eye-icon{
            position: absolute;
            top: 10px;
            right: 20px;
        }
    </style>
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">

                    <div class="page-body">
                        <div class="row">
                          <div class="col-md-11 m-auto">
                              <form action="{{ route('store.setting') }}" method="POST">
                                  @csrf
                                  <div class="row p-0 m-0">
                                      <div class="col-md-4">
                                          <div class="form-group">
                                              <div class="card">
                                                  <div class="card-header card bg-secondary text-white">
                                                      <b>Logo Image</b>
                                                  </div>
                                                  <div class="card-body">
                                                      <div class="uc-image">
                                                          <span class="clear-image-x">x</span>
                                                          <input type="hidden" name="logo_image" value="{{old("logo_image",$setting->logo_image)}}">
                                                          <div id='logo_image' class="image_display">
                                                              <img src="{{old("logo_image",$setting->logo_image)}}">
                                                          </div>
                                                          <div style="margin-top:10px;">
                                                              <a class="insert-media btn btn-info btn-sm" data-type="image" data-for="display" data-return="#logo_image" data-link="logo_image">Add Image</a>
                                                          </div>
                                                      </div>
                                                      <span class="text-danger">@error('logo_image'){{$message}}@enderror</span>

                                                  </div>
                                              </div>
                                          </div>
                                      </div>

                                      <div class="col-md-4">
                                          <div class="form-group">
                                              <div class="card">
                                                  <div class="card-header card bg-secondary text-white">
                                                      <b>Favicon</b>
                                                  </div>
                                                  <div class="card-body">
                                                      <div class="uc-image">
                                                          <span class="clear-image-x">x</span>
                                                          <input type="hidden" name="favicon" value="{{old("favicon",$setting->favicon)}}">
                                                          <div id='favicon' class="image_display">
                                                              <img src="{{old("favicon",$setting->favicon)}}">
                                                          </div>
                                                          <div style="margin-top:10px;">
                                                              <a class="insert-media btn btn-info btn-sm" data-type="image" data-for="display" data-return="#favicon" data-link="favicon">Add Image</a>
                                                          </div>
                                                      </div>
                                                      <span class="text-danger">@error('favicon'){{$message}}@enderror</span>

                                                  </div>
                                              </div>
                                          </div>
                                      </div>

                                      <div class="col-md-4">
                                          <div class="form-group">
                                              <div class="card">
                                                  <div class="card-header card bg-secondary text-white">
                                                      <b>OG Image</b>
                                                  </div>
                                                  <div class="card-body">
                                                      <div class="uc-image">
                                                          <span class="clear-image-x">x</span>
                                                          <input type="hidden" name="og_image" value="{{old("og_image",$setting->og_image)}}">
                                                          <div id='og_image' class="image_display">
                                                              <img src="{{old("og_image",$setting->og_image)}}">
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

                                  <div class="form-group d-none">
                                      <label for="exampleFormControlTextarea1">SMTP Email</label>
                                      <input type="email" name="smtp_email" class="form-control" value="{{ $setting->smtp_email }}" placeholder="SMTP Email">
                                      <span class="text-danger">@error('smtp_email'){{ $message }}@enderror</span>
                                  </div>

                                  <div class="form-group d-none">
                                      <label for="exampleFormControlTextarea1">SMTP Password</label>
                                      <div style="position: relative">
                                          <input type="password" name="smtp_password" class="form-control input-password" value="{{ decrypt($setting->smtp_password) }}" placeholder="SMTP Password">
                                          <i class="fa fa-eye eye-icon" aria-hidden="true"></i>
                                          <i class="fa fa-eye-slash d-none eye-icon" aria-hidden="true"></i>
                                      </div>

                                      <span class="text-danger">@error('smtp_password'){{ $message }}@enderror</span>
                                  </div>

                                  <div class="form-group">
                                      <label for="exampleFormControlTextarea1">Google Analytics</label>
                                      <textarea class="form-control" name="google_analytic" id="exampleFormControlTextarea1" rows="3">{!! $setting->google_analytic ?? '' !!}</textarea>
                                  </div>

                                  <div class="form-group">
                                      <label for="exampleFormControlTextarea1">Web Master Tools Meta Tags</label>
                                      <textarea class="form-control" name="web_master" id="exampleFormControlTextarea1" rows="3">{!! $setting->web_master ?? '' !!}</textarea>
                                  </div>

                                  <div class="form-group">
                                      <label for="exampleFormControlTextarea1">Bing Master Tools Meta Tags</label>
                                      <textarea class="form-control" name="bing_master" id="exampleFormControlTextarea1" rows="3">{!! $setting->bing_master ?? '' !!}</textarea>
                                  </div>
                                  <button type="submit" class="btn btn-primary">Submit</button>
                              </form>
                          </div>
                        </div>
                    </div>
                </div>

                <script>
                    const openEye = document.querySelector('.fa-eye');
                    const closeEye = document.querySelector('.fa-eye-slash');
                    const fa = document.querySelectorAll('.fa');
                    const inputPassword = document.querySelector('.input-password');

                    fa.forEach(el => {
                     el.addEventListener('click', function (e) {
                        if (e.target.classList.contains('fa-eye')){
                            inputPassword.type = 'text';
                            openEye.classList.add('d-none');
                            closeEye.classList.remove('d-none');
                        }else{
                            inputPassword.type = 'password';
                            openEye.classList.remove('d-none');
                            closeEye.classList.add('d-none');
                        }
                     });
                    });
                </script>
@endsection
