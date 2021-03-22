
</div>
</div>
</div>
</div>

<!-- Warning Section Starts -->

<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="{{ asset('backend/bower_components/jquery/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/bower_components/popper.js/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/bower_components/bootstrap/js/bootstrap.min.js') }}"></script>
@if(Request::segment(2) == 'create' && Request::segment(3) == 'post')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload  = function (e) {
                    $('#one')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(150);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURL2(input) {
            if (input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload  = function (e) {
                    $('#two')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(150);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endif

@if(Request::segment(2) == 'post' && Request::segment(3) == 'edit')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload  = function (e) {
                    $('#one')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(150);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURL2(input) {
            if (input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload  = function (e) {
                    $('#two')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(150);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endif
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{ asset('backend/bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{ asset('backend/bower_components/modernizr/js/modernizr.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/bower_components/modernizr/js/css-scrollbars.js') }}"></script>
<!-- Chart js -->
<script type="text/javascript" src="{{ asset('backend/bower_components/chart.js/js/Chart.js') }}"></script>
<!-- amchart js -->
<script src="{{ asset('backend/assets/pages/widget/amchart/amcharts.js') }}"></script>
<script src="{{ asset('backend/assets/pages/widget/amchart/serial.js') }}"></script>
<script src="{{ asset('backend/assets/pages/widget/amchart/light.js') }}"></script>
<!-- notification js -->
<script type="text/javascript" src="{{ asset('backend/assets/js/bootstrap-growl.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/assets/pages/notification/notification.js') }}"></script>
@if(Request::segment(2) == 'all' && Request::segment(3) == 'category')
    <script src="{{ asset('backend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/assets/pages/data-table/js/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/assets/pages/data-table/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/assets/pages/data-table/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/bower_components/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/bower_components/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/pages/data-table/js/data-table-custom.js') }}"></script>
@endif

@if(Request::segment(2) == 'create' && Request::segment(3) == 'post')
    {!! full_editor() !!}
    <!-- Select 2 js -->
    <script type="text/javascript" src="{{asset("backend\bower_components\select2\js\select2.full.min.js")}}"></script>
    <!-- Multiselect js -->
    <script type="text/javascript" src="{{asset("backend\bower_components\bootstrap-multiselect\js\bootstrap-multiselect.js")}}">


    </script>
    <script type="text/javascript" src="{{asset("backend\bower_components\multiselect\js\jquery.multi-select.js")}}"></script>
    <script type="text/javascript" src="{{asset("backend\assets\js\jquery.quicksearch.js")}}"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="{{asset("backend\assets\pages\advance-elements\select2-custom.js")}}"></script>

    <script type="text/javascript" src="{{ asset('backend\bower_components\switchery\js\switchery.min.js') }}"></script>

    <script>
        var elemsingle = document.querySelector('.js-single');
        var switchery = new Switchery(elemsingle, { color: '#4680ff', jackColor: '#fff' });
    </script>

@endif

@if(Request::segment(2) == 'post' && Request::segment(3) == 'edit')
    {!! full_editor() !!}
    <!-- Select 2 js -->
    <script type="text/javascript" src="{{asset("backend\bower_components\select2\js\select2.full.min.js")}}"></script>
    <!-- Multiselect js -->
    <script type="text/javascript" src="{{asset("backend\bower_components\bootstrap-multiselect\js\bootstrap-multiselect.js")}}">


    </script>
    <script type="text/javascript" src="{{asset("backend\bower_components\multiselect\js\jquery.multi-select.js")}}"></script>
    <script type="text/javascript" src="{{asset("backend\assets\js\jquery.quicksearch.js")}}"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="{{asset("backend\assets\pages\advance-elements\select2-custom.js")}}"></script>
    <script type="text/javascript" src="{{ asset('backend\bower_components\switchery\js\switchery.min.js') }}"></script>

    <script>
        var elemsingle = document.querySelector('.js-single');
        var switchery = new Switchery(elemsingle, { color: '#4680ff', jackColor: '#fff' });
    </script>
@endif


@if(Request::segment(2) == 'send' && Request::segment(3) == 'email')
    {!! full_editor() !!}
@endif
<!-- Switch component js -->

<!-- Tags js -->
<script type="text/javascript" src="{{ asset('backend\bower_components\bootstrap-tagsinput\js\bootstrap-tagsinput.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.10.4/typeahead.bundle.min.js"></script>
<!-- Custom js -->
{{--<script type="text/javascript" src="{{ asset('backend/assets/js/SmoothScroll.js') }}"></script>--}}
<script src="{{ asset('backend/assets/js/pcoded.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/vartical-layout.min.js') }}"></script>
{{--<script type="text/javascript" src="{{ asset('backend/assets/pages/dashboard/analytic-dashboard.min.js') }}"></script>--}}
<script type="text/javascript" src="{{ asset('backend/assets/js/script.js') }}"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>



<script>

    @if (Session::has('message'))
    let type = "{{ Session::get('alert-type','info') }}";
    switch (type) {
        case "info":
        function notify(message, type){
            $.growl({
                message: message
            },{
                type: type,
                allow_dismiss: false,
                label: 'Cancel',
                className: 'btn-xs btn-inverse',
                placement: {
                    from: 'top',
                    align: 'right'
                },
                delay: 4000,
                animate: {
                    enter: 'animated fadeInRight',
                    exit: 'animated fadeOutRight'
                },
                offset: {
                    x: 30,
                    y: 30
                }
            });
        };
            notify('{{ Session::get('message') }}', 'info');
            break;

        case "success":
        function notify(message, type){
            $.growl({
                message: message
            },{
                type: type,
                allow_dismiss: false,
                label: 'Cancel',
                className: 'btn-xs btn-inverse',
                placement: {
                    from: 'top',
                    align: 'right'
                },
                delay: 4000,
                animate: {
                    enter: 'animated fadeInRight',
                    exit: 'animated fadeOutRight'
                },
                offset: {
                    x: 30,
                    y: 30
                }
            });
        };
            notify('{{ Session::get('message') }}', 'success');
            break;

        case "error":
        function notify(message, type){
            $.growl({
                message: message
            },{
                type: type,
                allow_dismiss: false,
                label: 'Cancel',
                className: 'btn-xs btn-inverse',
                placement: {
                    from: 'top',
                    align: 'right'
                },
                delay: 4000,
                animate: {
                    enter: 'animated fadeInRight',
                    exit: 'animated fadeOutRight'
                },
                offset: {
                    x: 30,
                    y: 30
                }
            });
        };
            notify('{{ Session::get('message') }}', 'danger');
            break;

        case "warning":
        function notify(message, type){
            $.growl({
                message: message
            },{
                type: type,
                allow_dismiss: false,
                label: 'Cancel',
                className: 'btn-xs btn-inverse',
                placement: {
                    from: 'top',
                    align: 'right'
                },
                delay: 4000,
                animate: {
                    enter: 'animated fadeInRight',
                    exit: 'animated fadeOutRight'
                },
                offset: {
                    x: 30,
                    y: 30
                }
            });
        };
            notify('{{ Session::get('message') }}', 'warning');
            break;
    }
    @endif
</script>


</body>

</html>
