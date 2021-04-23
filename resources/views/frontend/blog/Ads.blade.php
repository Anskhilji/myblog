@if(is_array($Ads) and count($Ads)>0)
<div class="ads-img">
	<a href="{{$Ads['url']}}" title="{{$Ads['title']}}" target="_blank">
		<img class="img-fluid w-100 lazy img-thumbnail" src="{{$Ads['img']}}" alt="{{$Ads['alt']}}" style="">
	</a>
</div>
@endif