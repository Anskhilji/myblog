
</div>
</div>
</div>
</div>

<!-- Warning Section Starts -->

<!-- Warning Section Ends -->
<!-- Required Jquery -->
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
<script type="text/javascript" src="{{ asset('backend/Chart.min.js') }}"></script>
@if(Request::segment(1) == 'admin' && Request::segment(2) == 'dashboard')
    <script>
        function _____vchart(labels, d1){
            var lineData = {
                labels:  labels,
                datasets: [
                    {
                        label: "Website Views",
                        fillColor: "rgba(0,128,0,0.2)",
                        pointColor: "rgba(0,128,0,1)",
                        backgroundColor: 'rgba(0,128,0,0.4)',
                        pointBackgroundColor: "rgba(0,128,0,0.9)",
                        data: d1
                    }
                ]
            };
            var lineOptions = {
                responsive: true,
                tooltips: {mode: 'index',intersect: false,caretPadding: 20,bodyFontColor: "#000000",bodyFontSize: 14,bodyFontColor: '#FFFFFF',bodyFontFamily: "'Helvetica', 'Arial', sans-serif",footerFontSize: 50,callbacks: {
                        label: function(tooltipItem, data) {
                            var label = data.datasets[tooltipItem.datasetIndex].label || '';
                            if (label) {
                                label += ': ';
                            }
                            label += tooltipItem.yLabel.toLocaleString();
                            return label;
                        }
                    }},
                hover: {mode: 'nearest',intersect: true},
                animation: {
                    duration: 3000,
                },
                scales: {
                    yAxes:[{
                        ticks:{
                            callback:function(value, index, values){
                                return value.toLocaleString();
                            }
                        }
                    }]
                }
            };
            $("canvas#vlineChart").remove();
            $("div.vchartreport").append('<canvas id="vlineChart" height="225" style="display: block; width: 483px; height: 225px;" width="483" class="vchartjs-render-monitor"></canvas>');
            var ctx = document.getElementById("vlineChart").getContext("2d");
            let draw = Chart.controllers.line.prototype.draw;
            Chart.controllers.line = Chart.controllers.line.extend({
                draw: function() {
                    draw.apply(this, arguments);
                    let ctx = this.chart.chart.ctx;
                    let _stroke = ctx.stroke;
                    ctx.stroke = function() {
                        ctx.save();
                        _stroke.apply(this, arguments)
                        ctx.restore();
                    }
                }
            });
            Chart.defaults.LineWithLine = Chart.defaults.line;
            Chart.controllers.LineWithLine = Chart.controllers.line.extend({
                draw: function(ease) {
                    Chart.controllers.line.prototype.draw.call(this, ease);
                    if (this.chart.tooltip._active && this.chart.tooltip._active.length) {
                        var activePoint = this.chart.tooltip._active[0],
                            ctx = this.chart.ctx,
                            x = activePoint.tooltipPosition().x,
                            topY = this.chart.scales['y-axis-0'].top,
                            bottomY = this.chart.scales['y-axis-0'].bottom;
                        // draw line
                        ctx.save();
                        ctx.beginPath();
                        ctx.moveTo(x, topY);
                        ctx.lineTo(x, bottomY);
                        ctx.lineWidth = 2;
                        ctx.strokeStyle = '#07C';
                        ctx.stroke();
                        ctx.restore();
                    }
                }
            });
            chart = new Chart(ctx, {type: 'LineWithLine', data: lineData, options:lineOptions});
        }
        function kFormatter(num) {
            return Math.abs(num) > 999 ? Math.sign(num)*((Math.abs(num)/1000).toFixed(1)) + 'k' : Math.sign(num)*Math.abs(num)
        }
        var d = @json($views);
        _____vchart(d["labels"], d["data1"]);
    </script>

@endif
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

@if(Request::segment(2) == 'all' && Request::segment(3) == 'post')
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

@if(Request::segment(2) == 'post' && Request::segment(3) == 'draft')
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
@if(Request::segment(2) == 'post' && Request::segment(3) == 'publish')
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

@if(Request::segment(2) == 'author' && Request::segment(3) == 'list')
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
@if(Request::segment(2) == 'author' && Request::segment(3) == 'create')
    {!! full_editor() !!}
@endif

@if(Request::segment(2) == 'author' && Request::segment(3) == 'edit')
    {!! full_editor() !!}
@endif

@if(Request::segment(2) == 'create' && Request::segment(3) == 'post')
    {!! full_editor() !!}
    <script>
        // Green Text JS
        let addGreen = document.querySelector('.add_green');
        let defaultGreen = document.querySelector('.default-green');
        addGreen.addEventListener('click', function (e) {
            let html = `
                    <div class="row m-4 green-text" style="border: 2px solid #90949882;">
                        <div style="width: 100%; padding: 0px; margin: 0px; display: flex; justify-content: flex-end">
                            <i class="fa fa-times text-white close" aria-hidden="true" style="cursor: pointer; background: red; padding: 7px 10px; margin: 0"></i>
                        </div>
                        <p style="text-align: center; width: 100%; font-size: 14px; font-weight: bold;">Green Text
                            <span class="count">2</span></p>
                        <div class="col-md-12  pl-4 pr-4 pb-4">
                            <div class="form-group mb-0">
                                <label for="#PostDetails">Heading</label>
                                <input type="text" class="form-control" name="green_heading[]">
                            </div>
                        </div>

                        <div class="col-md-12  pl-4 pr-4 pb-4">
                            <div class="form-group mb-0">
                                <label for="#PostDetails">Body</label>
                                <textarea class="form-control oneditor" name="green_body[]" rows="5" placeholder="Post details..."></textarea>
                            </div>
                        </div>
                    </div>
                    `;
            defaultGreen.insertAdjacentHTML('beforeend', html);
            full_editor();

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
        });
        //End Green Text JS

        // Red Text JS
        let addRed = document.querySelector('.add_red');
        let defaultRed = document.querySelector('.default-red');
        addRed.addEventListener('click', function (e) {
            let html = `
                    <div class="row m-4 red-text" style="border: 2px solid #90949882;">
                        <div style="width: 100%; padding: 0px; margin: 0px; display: flex; justify-content: flex-end">
                            <i class="fa fa-times text-white close-red" aria-hidden="true" style="cursor: pointer; background: red; padding: 7px 10px; margin: 0"></i>
                        </div>
                        <p style="text-align: center; width: 100%; font-size: 14px; font-weight: bold;">Red Text
                            <span class="count-red">2</span></p>
                        <div class="col-md-12  pl-4 pr-4 pb-4">
                            <div class="form-group mb-0">
                                <label for="#RedHeading">Heading</label>
                                <input type="text" class="form-control" name="red_heading[]">
                            </div>
                        </div>

                        <div class="col-md-12  pl-4 pr-4 pb-4">
                            <div class="form-group mb-0">
                                <label for="#RedBody">Body</label>
                                <textarea class="form-control oneditor" name="red_body[]" rows="5" placeholder="Post details..."></textarea>
                            </div>
                        </div>
                    </div>
                    `;
            defaultRed.insertAdjacentHTML('beforeend', html);
            full_editor();

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
        });
        //End Red Text JS

        // Black Text JS
        let addBlack = document.querySelector('.add_black');
        let defaultBlack = document.querySelector('.default-black');
        addBlack.addEventListener('click', function (e) {
            let html = `
                    <div class="row m-4 black-text" style="border: 2px solid #90949882;">
                        <div style="width: 100%; padding: 0px; margin: 0px; display: flex; justify-content: flex-end">
                            <i class="fa fa-times text-white close-black" aria-hidden="true" style="cursor: pointer; background: red; padding: 7px 10px; margin: 0"></i>
                        </div>
                        <p style="text-align: center; width: 100%; font-size: 14px; font-weight: bold;">Black Text
                            <span class="count-black">2</span></p>
                        <div class="col-md-12  pl-4 pr-4 pb-4">
                            <div class="form-group mb-0">
                                <label for="#RedHeading">Heading</label>
                                <input type="text" class="form-control" name="black_heading[]">
                            </div>
                        </div>

                        <div class="col-md-12  pl-4 pr-4 pb-4">
                            <div class="form-group mb-0">
                                <label for="#RedBody">Body</label>
                                <textarea class="form-control oneditor" name="black_body[]" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    `;
            defaultBlack.insertAdjacentHTML('beforeend', html);
            full_editor();
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
        });
        //End Black Text JS

        // Blog Faqs JS
        let addFaqs = document.querySelector('.add_faqs');
        let defaultFaqs = document.querySelector('.default-faqs');
        addFaqs.addEventListener('click', function (e) {
            let html = `
                    <div class="row m-4 faqs" style="border: 2px solid #90949882;">
                        <div style="width: 100%; padding: 0px; margin: 0px; display: flex; justify-content: flex-end">
                            <i class="fa fa-times text-white close-faqs" aria-hidden="true" style="cursor: pointer; background: red; padding: 7px 10px; margin: 0"></i>
                        </div>
                        <p style="text-align: center; width: 100%; font-size: 14px; font-weight: bold;">Faqs
                            <span class="count-faqs">2</span></p>
                        <div class="col-md-12  pl-4 pr-4 pb-4">
                            <div class="form-group mb-0">
                                <label for="#Question">Question</label>
                                <input type="text" class="form-control" name="faqs_question[]">
                            </div>
                        </div>

                        <div class="col-md-12  pl-4 pr-4 pb-4">
                            <div class="form-group mb-0">
                                <label for="#Answer">Answer</label>
                                <textarea class="form-control oneditor" name="faqs_answer[]" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    `;
            defaultFaqs.insertAdjacentHTML('beforeend', html);
            full_editor();
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
        });
        //End Blog Faqs JS

    </script>

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
    <script>
        // Green Text JS
        let addGreen = document.querySelector('.add_green');
        let defaultGreen = document.querySelector('.default-green');
        addGreen.addEventListener('click', function (e) {
            let html = `
                    <div class="row m-4 green-text" style="border: 2px solid #90949882;">
                        <div style="width: 100%; padding: 0px; margin: 0px; display: flex; justify-content: flex-end">
                            <i class="fa fa-times text-white close" aria-hidden="true" style="cursor: pointer; background: red; padding: 7px 10px; margin: 0"></i>
                        </div>
                        <p style="text-align: center; width: 100%; font-size: 14px; font-weight: bold;">Green Text
                            <span class="count">2</span></p>
                        <div class="col-md-12  pl-4 pr-4 pb-4">
                            <div class="form-group mb-0">
                                <label for="#PostDetails">Heading</label>
                                <input type="text" class="form-control" name="green_heading[]">
                            </div>
                        </div>

                        <div class="col-md-12  pl-4 pr-4 pb-4">
                            <div class="form-group mb-0">
                                <label for="#PostDetails">Body</label>
                                <textarea class="form-control oneditor" name="green_body[]" rows="5" placeholder="Post details..."></textarea>
                            </div>
                        </div>
                    </div>
                    `;
            defaultGreen.insertAdjacentHTML('beforeend', html);
            full_editor();

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
        });
        //End Green Text JS

        // Red Text JS
        let addRed = document.querySelector('.add_red');
        let defaultRed = document.querySelector('.default-red');
        addRed.addEventListener('click', function (e) {
            let html = `
                    <div class="row m-4 red-text" style="border: 2px solid #90949882;">
                        <div style="width: 100%; padding: 0px; margin: 0px; display: flex; justify-content: flex-end">
                            <i class="fa fa-times text-white close-red" aria-hidden="true" style="cursor: pointer; background: red; padding: 7px 10px; margin: 0"></i>
                        </div>
                        <p style="text-align: center; width: 100%; font-size: 14px; font-weight: bold;">Red Text
                            <span class="count-red">2</span></p>
                        <div class="col-md-12  pl-4 pr-4 pb-4">
                            <div class="form-group mb-0">
                                <label for="#RedHeading">Heading</label>
                                <input type="text" class="form-control" name="red_heading[]">
                            </div>
                        </div>

                        <div class="col-md-12  pl-4 pr-4 pb-4">
                            <div class="form-group mb-0">
                                <label for="#RedBody">Body</label>
                                <textarea class="form-control oneditor" name="red_body[]" rows="5" placeholder="Post details..."></textarea>
                            </div>
                        </div>
                    </div>
                    `;
            defaultRed.insertAdjacentHTML('beforeend', html);
            full_editor();

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
        });
        //End Red Text JS

        // Black Text JS
        let addBlack = document.querySelector('.add_black');
        let defaultBlack = document.querySelector('.default-black');
        addBlack.addEventListener('click', function (e) {
            let html = `
                    <div class="row m-4 black-text" style="border: 2px solid #90949882;">
                        <div style="width: 100%; padding: 0px; margin: 0px; display: flex; justify-content: flex-end">
                            <i class="fa fa-times text-white close-black" aria-hidden="true" style="cursor: pointer; background: red; padding: 7px 10px; margin: 0"></i>
                        </div>
                        <p style="text-align: center; width: 100%; font-size: 14px; font-weight: bold;">Black Text
                            <span class="count-black">2</span></p>
                        <div class="col-md-12  pl-4 pr-4 pb-4">
                            <div class="form-group mb-0">
                                <label for="#RedHeading">Heading</label>
                                <input type="text" class="form-control" name="black_heading[]">
                            </div>
                        </div>

                        <div class="col-md-12  pl-4 pr-4 pb-4">
                            <div class="form-group mb-0">
                                <label for="#RedBody">Body</label>
                                <textarea class="form-control oneditor" name="black_body[]" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    `;
            defaultBlack.insertAdjacentHTML('beforeend', html);
            full_editor();
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
        });
        //End Black Text JS

        // Blog Faqs JS
        let addFaqs = document.querySelector('.add_faqs');
        let defaultFaqs = document.querySelector('.default-faqs');
        addFaqs.addEventListener('click', function (e) {
            let html = `
                    <div class="row m-4 faqs" style="border: 2px solid #90949882;">
                        <div style="width: 100%; padding: 0px; margin: 0px; display: flex; justify-content: flex-end">
                            <i class="fa fa-times text-white close-faqs" aria-hidden="true" style="cursor: pointer; background: red; padding: 7px 10px; margin: 0"></i>
                        </div>
                        <p style="text-align: center; width: 100%; font-size: 14px; font-weight: bold;">Faqs
                            <span class="count-faqs">2</span></p>
                        <div class="col-md-12  pl-4 pr-4 pb-4">
                            <div class="form-group mb-0">
                                <label for="#Question">Question</label>
                                <input type="text" class="form-control" name="faqs_question[]">
                            </div>
                        </div>

                        <div class="col-md-12  pl-4 pr-4 pb-4">
                            <div class="form-group mb-0">
                                <label for="#Answer">Answer</label>
                                <textarea class="form-control oneditor" name="faqs_answer[]" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    `;
            defaultFaqs.insertAdjacentHTML('beforeend', html);
            full_editor();
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
        });
        //End Blog Faqs JS

    </script>

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

@if(Request::segment(1) == 'admin' && Request::segment(2) == 'privacy-policy')
    {!! full_editor() !!}
@endif

@if(Request::segment(1) == 'admin' && Request::segment(2) == 'terms-condition')
    {!! full_editor() !!}
@endif

@if(Request::segment(1) == 'admin' && Request::segment(2) == 'faqs')
    {!! full_editor() !!}
    <script>
        $( function() {
            $( "#sortable" ).sortable({
                update: function( event, ui ) {
                    var n = 0;
                    $("#sortable .row").each(function(){
                        $(this).find(".uc-image").find("input").attr("name", "img"+n);
                        $(this).find(".image_display").attr("id", "img"+n);
                        n++;
                    });
                },
                revert: true
            });
            $( "#draggable" ).draggable({
                connectToSortable: "#sortable",
                helper: "clone",
                revert: "invalid"
            });
            $( "ul, li" ).disableSelection();
        });
    </script>
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

@php
    $mediaPanel = new \hassankwl1001\mediapanel\Http\Controllers\MediaPanelController;
    echo $mediaPanel->index();
@endphp

    <script>

        $(document).on("click", ".clear-image-x", function(){
            var r = window.confirm("Do you wnat to delete image");
            if (r){
                $(this).parent().find("input").val("");
                $(this).parent().find(".image_display").html("");
            }
        });
    </script>



@if(Request::segment(1) == 'admin' && Request::segment(2) == 'menu')
<script src="{{ asset('backend/menu/nestable.js') }}"></script>
<script>
    $(document).ready(function(){
        var updateOutput = function (e) {
            var list = e.length ? e : $(e.target),
                output = list.data('output');
            if (window.JSON) {
                output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
            } else {
                output.val('JSON browser support required for this demo.');
            }
        };
        // activate Nestable for list 1
        $('#nestable').nestable({
            group: 1,
            maxDepth: 3
        }).on('change', updateOutput);
        // output initial serialised data
        updateOutput($('#nestable').data('output', $('#nestable-output')));

        $('#nestable-menu').on('click', function (e) {
            var target = $(e.target),
                action = target.data('action');
            if (action === 'expand-all') {
                $('.dd').nestable('expandAll');
            }
            if (action === 'collapse-all') {
                $('.dd').nestable('collapseAll');
            }
        });

        function add_to_menu(type,title, slug){
            var list = $(".main-dd-list");
            var data = "<li "+
                "class='dd-item' "+
                "data-type='"+type+"'"+
                "data-title='"+title+"'"+
                "data-link='"+slug+"'>"+
                "<div class='dd-handle'>"+title+""+
                "<span class='menu-del pull-right' data-id='x'>x</span>"+
                "<span class='type pull-right'>"+type+"</span>"+
                "</div>"+
                "</li>";
            list.append(data);
            updateOutput($('#nestable').data('output', $('#nestable-output')));
        }

        $(".menu-added").click(function(){
            var type, id, title, slug;
            var type = $(this).data("type");
            if (type=="page" || type=="category"){
                id = $(this).data("id");
                title = $(this).data("title");
                slug = $(this).data("link");
            }else{
                title = $("input[name='text']").val();
                slug = $("input[name='url']").val();
                slug = (slug=="") ? "#" : slug;
            }
            if (title==""){
                alert("Please enter link title");
            }else{
                $("input[name='text']").val("");
                $("input[name='url']").val("");
                add_to_menu(type, title, slug);
            }

        });

        $(document).on("click",".menu-del",function(){
            var s = window.confirm("Do you want to continue?");
            if (s){
                $(this).closest(".dd-item").remove();
                updateOutput($('#nestable').data('output', $('#nestable-output')));
            }
        });

        $(".save-menu").click(function(){
            var data = $("#nestable-output").val();
            var d = JSON.parse(data);
            var r = "Enter menu item.";
            if (Object.keys(d).length > 0){
                // window.location = "?menu="+check+"&sv=1";
                return true;
            }
            alert(r);
            return false;
        });

    });
</script>
@endif
</body>

</html>
