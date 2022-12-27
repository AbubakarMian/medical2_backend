@extends('layouts.default_module')
@section('module_name')
Category
@stop
@section('add_btn')

{!! Form::open(['method' => 'get', 'route' => ['category.create'], 'files'=>true]) !!}
<span>{!! Form::submit('Add', ['class' => 'btn btn-success pull-right']) !!}</span>
{!! Form::close() !!}
@stop

@section('table-properties')
width="400px" style="table-layout:fixed;"
@endsection


<style>
	td {
		white-space: nowrap;
		overflow: hidden;
		width: 30px;
		height: 30px;
		text-overflow: ellipsis;
	}
</style>
@section('table')


<thead>
	<tr>


        <th> Name</th>
        <th> Description</th>
        <th> Image</th>


	    <th>Edit  </th>
		<th>Delete  </th>



	</tr>
</thead>
<tbody>



    @foreach($category as $c)




		<td >{!! ucwords($c->name ) !!} </td>
		<td >{!!ucwords($c->description) !!}</td>
        <?php if (!$c->avatar) {
			$c->avatar = asset('images/logo.png');
			}

	    ?>


	   <td><img width="100px" src="{!! 	$c->avatar  !!}" class="show-product-img imgshow"></td>






        </td>
        <td>
            {!! link_to_action('Admin\CategoryController@edit',
            'Edit', array($c->id), array('class' => 'badge bg-info')) !!}

        </td>


		<td>{!! Form::open(['method' => 'POST', 'route' => ['category.delete', $c->id]]) !!}
			<a href="" data-toggle="modal" name="activate_delete" data-target=".delete" modal_heading="Alert" modal_msg="Do you want to delete?">
				<span class="badge bg-info btn-primary ">
					{!! $c->deleted_at?'Activate':'Delete' !!}</span></a>
			{!! Form::close() !!}
		</td>


	</tr>
	@endforeach


</tbody>
@section('pagination')
<span class="pagination pagination-md pull-right">{!! $category->render() !!}</span>
<div class="col-md-3 pull-left">
	<div class="form-group text-center">

	</div>
</div>
@endsection
@stop
