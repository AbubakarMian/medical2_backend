<h3>{!!$table_name!!}</h3>
<table>
<thead>
<tr>
    @foreach($columns as $c)
    <th>{!!$c!!}</th>
    @endforeach
</tr>
</thead>
<tbody>
    @foreach($table_data as $trow)
    <?php 
        if($trow->id == 97){
            // dd($trow);
        }
    
    ?>
    <tr>
        @foreach($trow as $td)
            <td>{!! strip_tags( strlen($td)< 15 ? $td : substr($td,0,15).'...') !!}</td>
        @endforeach
    </tr>
    @endforeach
</tbody>
</table>