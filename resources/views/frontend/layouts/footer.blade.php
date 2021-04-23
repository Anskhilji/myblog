<!--Main Footer-->
<footer class="main-footer">
    <div class="widgets-section">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Widget Column-->
                <div class="widget-column col-lg-6 col-md-6 col-sm-12">
                    <div class="footer-widget tweets-widget">
                        <div class="sidebar-widget categories-widget">
                                <div class="sidebar-title" style="background-color: #28292D">
                                    <h2>Recent Post</h2>
                                </div>
                            @forelse(\App\Models\Post::where('post_status',1)->orderBy('id','desc')->limit(3)->get() as $rp)
                                <article class="widget-post">
                                    <figure class="post-thumb"><a href="{{ url($rp->slug.'-'.'2'.$rp->id) }}">
                                            <img class="wow fadeIn animated" data-wow-delay="0ms" data-wow-duration="2500ms" src="{{ asset($rp->post_cover_image) }}" alt="" style="visibility: visible; animation-duration: 2500ms; animation-delay: 0ms; animation-name: fadeIn;"></a><div class="overlay"><span class="icon qb-play-arrow"></span></div></figure>
                                    <div class="text"><a href="{{ url($rp->slug.'-'.'2'.$rp->id) }}" style="color: #fff;">{{ $rp->post_title }}</a></div>
                                    <div class="post-info">{{ $rp->created_at->diffForHumans() }}</div>
                                </article>
                            @empty
                                <h3>No Post Available</h3>
                            @endforelse
                        </div>
                    </div>
                </div>


                <!--Widget Column / Newsletter Widget-->
                <div class="widget-column col-lg-6 col-md-6 col-sm-12">
                    <div class="footer-widget newsletter-widget">
                        <h1>Newsletter</h1>
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
                                    <button type="submit" class="theme-btn btn-style-one" style="cursor: pointer">Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <div class="footer-cptf">
                <a href="{{ route('contact-us') }}">Contct Us</a>
                <a href="{{ route('privacy.policy') }}">Privacy Policy</a>
                <a href="{{ route('terms.condition') }}">Terms & Conditions</a>
                <a href="{{ route('faqs') }}">FAQs</a>
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
                            <div class="addthis_inline_share_toolbox"></div>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="copyright">&copy; Copyright Digital Applications. All rights reserved.</div>
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

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script defer type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f968771b4d84134"></script>

<script src="{{ asset('frontend/js/jquery.js') }}"></script>
<script defer src="{{ asset('frontend/js/popper.min.js') }}"></script>
<script defer src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script defer src="{{ asset('frontend/js/jquery.fancybox.js') }}"></script>
<script defer src="{{ asset('frontend/js/owl.js') }}"></script>
<script defer src="{{ asset('frontend/js/appear.js') }}"></script>
<script defer src="{{ asset('frontend/js/wow.js') }}"></script>
<script defer src="{{ asset('frontend/js/validate.js') }}"></script

<script defer src="{{ asset('frontend/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>

<script defer src="{{ asset('frontend/js/script.js') }}"></script>

<script defer>
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
<script>
    // document.querySelectorAll('.smooth-goto').forEach(el=>{
    //     el.addEventListener('click', function (e) {
    //         e.preventDefault();
    //         const id = this.getAttribute('href');
    //         let splitId = id.split('#');
    //         const scrollId = '#'+splitId[1];
    //
    //         document.querySelector(scrollId).scrollIntoView({
    //             behavior: "smooth"
    //         });
    //     })
    // });
    $(document).ready(function(){
        $(".smooth-goto").each(function(){
            $(this).click(function() {
                var id = $(this).attr("href");
                var hash = id.split("#");
                var to  = "#"+hash[1];
                $([document.documentElement, document.body]).animate({
                    scrollTop: $(to).offset().top-90
                }, 500);
            });
        });
    });

</script>

</body>

<!-- Mirrored from ary-themes.com/html/noor_tech/newspoint/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Mar 2021 05:07:36 GMT -->
</html>
