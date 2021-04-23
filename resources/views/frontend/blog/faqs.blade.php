@if(is_array($faqs) and count($faqs) >0)
<section class="faqs-section">
  <h4 class="text-purple for-align pad-fr-y"> Frequently Asked Questions</h4>
{{--  @foreach($faqs as $faq)--}}
{{--  <button class="collapsible">{{$faq[0]}}</button>--}}
{{--  <div class="content">--}}
{{--	 <p>{!!$faq[1]!!}</p>--}}
{{--  </div>--}}
{{--  @endforeach--}}
    @forelse($faqs as $key =>$faq)
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link w-100 text-left" type="button"
                            data-toggle="collapse" data-target="#collapse{{$key}}"
                            aria-expanded="true" aria-controls="collapse{{$key}}">
                        {!! $faq[0] !!}
                    </button>
                </h5>
            </div>

            <div id="collapse{{$key}}" class="collapse {{ $key == 0 ? 'show' : '' }}" aria-labelledby="heading{{$key}}" data-parent="#accordionExample">
                <div class="card-body">
                    {!! $faq[1] !!}
                </div>
            </div>
        </div>
    @empty
        ""
    @endforelse
</section>

@endif
