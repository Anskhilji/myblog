@if(is_array($galler_images) and count($galler_images) >0)
<div class="row gl-p">
@php
$count = 1;
@endphp
 @foreach($galler_images as $gallery=>$gal)
  <div class="column">
   <img src="{{$gal}}" style="width:100%" onclick="openModal();currentSlide({{$count++}})" class="hover-shadow cursor">
  </div>
 @endforeach
</div>
<div id="myModal" class="modal c-gal" style="height: 100vh;">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="modal-content">
  @php
$counte = 1;
@endphp
  @foreach($galler_images as $gallery=>$gal)
	<div class="mySlides">
                      <div class="numbertext">{{$counte++}} / {{count($galler_images)}}</div>
	  <img src="{{$gal}}" style="width:100%">
	</div>
  @endforeach
  <a class="prev" style="left: 0px;" onclick="plusSlides(-1)">&#10094;</a>
	<a class="next" onclick="plusSlides(1)">&#10095;</a>

	<div class="caption-container">
	  <p id="caption"></p>
	</div>
	@php
$counter = 1;
@endphp
	@foreach($galler_images as $gallery=>$gal)
	<div class="column">
	  <img class="demo cursor" src="{{$gal}}"  onclick="currentSlide({{$counter++}})" alt="">
	</div>
	@endforeach
  </div>
</div>

@endif
              