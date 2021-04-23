@if(is_array($green_text) and count($green_text) >0)
<table class="table tbl-border tbl-green margin-for-y border">
  <tbody>
	 <tr>
		<th class="bg-success text-white"><h3>{!!$green_text[0]!!}</h3>
		</th>
	 </tr>
	 <tr>
		<td>
		 {!!$green_text[1]!!}
		</td>
	 </tr>
  </tbody>
</table>
@endif
