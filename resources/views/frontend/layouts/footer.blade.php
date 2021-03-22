<!--Main Footer-->
<footer class="main-footer">
    <div class="widgets-section">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Widget Column-->
                <div class="widget-column col-lg-6 col-md-6 col-sm-12">
                    <div class="footer-widget tweets-widget">
                        <h2>Tweeter Feeds</h2>
                        <!--Tweet-->
                        <div class="tweet">
                            <div class="icon"><span class="fa fa-twitter"></span></div>
                            <div class="text">
                                <a href="#">@ Barished all share them a man said inspet.</a>
                            </div>
                            <span class="days">about 2 days ago</span>
                        </div>
                        <!--Tweet-->
                        <div class="tweet">
                            <div class="icon"><span class="fa fa-twitter"></span></div>
                            <div class="text">
                                <a href="#">@ Well wors all share them a women said inspet.</a>
                            </div>
                            <span class="days">about 8 weeks ago</span>
                        </div>
                    </div>
                </div>


                <!--Widget Column / Newsletter Widget-->
                <div class="widget-column col-lg-6 col-md-6 col-sm-12">
                    <div class="footer-widget newsletter-widget">

                        <h2>Newsletter</h2>
                        <div class="newsletter-form">
                            <form method="post" action="{{ route('store.subscriber') }}" class="form">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="name" value="" class="input-name" placeholder="Name" autocomplete="off">
                                    <span class="text-danger name-require"></span>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" value="" class="input-email" placeholder="Email" autocomplete="off">
                                    <span class="text-danger email-require"></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="theme-btn btn-style-one">Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--Footer Bottom-->
    <div class="footer-bottom p-0">

        <!--Copyright Section-->
        <div class="copyright-section">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <ul class="social-icon-one">
                            <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                            <li class="twitter"><a href="#"><span class="fa fa-twitter"></span></a></li>
                            <li class="g_plus"><a href="#"><span class="fa fa-google-plus"></span></a></li>
                            <li class="linkedin"><a href="#"><span class="fa fa-linkedin"></span></a></li>
                            <li class="pinteret"><a href="#"><span class="fa fa-pinterest-p"></span></a></li>
                            <li class="android"><a href="#"><span class="fa fa-android"></span></a></li>
                            <li class="dribbble"><a href="#"><span class="fa fa-dribbble"></span></a></li>
                            <li class="rss"><a href="#"><span class="fa fa-rss"></span></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="copyright">&copy; Copyright Noor_tech. All rights reserved.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--End Main Footer-->

</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon fa fa-angle-double-up"></span></div>

<!-- Color Palate / Color Switcher -->


<script src="{{ asset('frontend/js/jquery.js') }}"></script>
<script src="{{ asset('frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.fancybox.js') }}"></script>
<script src="{{ asset('frontend/js/owl.js') }}"></script>
<script src="{{ asset('frontend/js/appear.js') }}"></script>
<script src="{{ asset('frontend/js/wow.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('frontend/js/script.js') }}"></script>

<script>
    const form = document.querySelector('.form');
    form.addEventListener('submit', function (e) {
       e.preventDefault();
       document.querySelector('.btn-style-one').textContent = 'Sending...';
       const dataArr = [...new FormData(this)];
       const data = Object.fromEntries(dataArr);
        // console.log(data);
       const sendFormData = async function(){
           try{
               const sendJson = await fetch("{{ route('store.subscriber') }}",{
                   method: 'POST',
                   headers: {
                       'Content-Type': 'application/json',
                   },
                   body: JSON.stringify(data),
               });

               const res = await sendJson.json();
               if(res.name){
                    document.querySelector('.name-require').textContent = res.name;
                   document.querySelector('.btn-style-one').textContent = 'Subscribe';

               }
               if(res.email){
                    document.querySelector('.email-require').textContent = res.email;
                   document.querySelector('.btn-style-one').textContent = 'Subscribe';
               }

               if(res.alert == 'success'){
                    const html = `
                                 <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <span class="success-msg">${res.message}</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            `;
                    const showSuccessMessage = document.querySelector('.newsletter-widget');
                    showSuccessMessage.insertAdjacentHTML('afterbegin', html);
                   document.querySelector('.btn-style-one').textContent = 'Subscribe';
                   document.querySelector('.name-require').textContent = '';
                   document.querySelector('.email-require').textContent = '';
                   document.querySelector('.input-name').value = '';
                   document.querySelector('.input-email').value = '';

               }

           }catch (e) {
               alert(e);
           }
       }

       sendFormData();



    });
</script>

</body>

<!-- Mirrored from ary-themes.com/html/noor_tech/newspoint/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Mar 2021 05:07:36 GMT -->
</html>
