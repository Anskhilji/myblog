<div class="related-row">
  <div class="pad-fr-y">
	 <h5 class="text-capitalize">You may also Like these posts
	 </h5>
	 <ul class="nav">
            <ul class="">
                @foreach($res as $related)
                    <li class="d-flex align-items-center"><i class="icon-point-right mr-2"></i><a href="{{url($related->slug.'-'.'2'.$related->id) }}">{{ $related->post_title }}</a></li>
                @endforeach
            </ul>
	 </ul>
  </div>
</div>
