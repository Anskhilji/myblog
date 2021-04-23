@if(is_array($black_text) and count($black_text) >0)
<table class="table tbl-border tbl-dark margin-for-y border">
  <tbody>
  <tr>
      <th class="text-white" style="background: black"><h3>{!!$black_text[0]!!}</h3>
      </th>
  </tr>
  <tr>
      <td>
          {!!$black_text[1]!!}
      </td>
  </tr>
  </tbody>
</table>
@endif
