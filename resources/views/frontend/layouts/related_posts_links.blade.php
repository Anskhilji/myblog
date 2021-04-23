<div>
{{--    {{ dd($related_posts) }}--}}
    <h3>You May Also Like</h3>
    <ul class="">
        @foreach($related_posts as $related)
            <li class="d-flex align-items-center"><i class="icon-point-right mr-2"></i><a href="{{url($related->slug.'-'.'2'.$related->id) }}">{{ $related->post_title }}</a></li>
        @endforeach
    </ul>
</div>
