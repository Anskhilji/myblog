@if(is_array($red_text) and count($red_text) >0)
 <table class="table tbl-border tbl-red margin-for-y border">
  <tbody>
	 <tr>
		<th class="bg-danger text-white"><h3>{{$red_text[0]}}</h3></th>
	 </tr>
	 <tr>
		<td>
		   <p class="text-justify text-just">{!!$red_text[1]!!}</p>
		</td>
	 </tr>
  </tbody>
</table>
@endif
