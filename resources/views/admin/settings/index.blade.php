@extends('layouts.default_module')
@section('module_name')
Product
@stop
@section('add_btn')

{!! Form::open(['method' => 'get', 'route' => ['product.create'], 'files'=>true]) !!}
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
{{-- {!! Form::open(['method' => 'post', 'route' => ['doctor.search'], 'files'=>true]) !!}
@include('admin.doctor.partial.searchfilters')
{!!Form::close() !!} --}}
{{-- @stop --}}

<thead>
	<tr>


		<th>Name</th>
		<th>Image  </th>
		<th>Details  </th>
		<th>Amount  </th>
		<th>Points  </th>
		<th>Edit  </th>
		<th>Delete  </th>
		<th>Promotion </th>


	</tr>
</thead>
<tbody>



    @foreach($product as $p)
		<td >{!! ucwords($p->name) !!}</td>

		<?php if (!$p->avatar) {
			$p->avatar = asset('images/map.png');
			}

	    ?>
        <td><img width="100px" src="{!! $p->avatar  !!}" class="show-product-img imgshow"></td>

		<td >{!! ucwords($p->detail) !!}</td>

		<td >{!! $p->price*$point_price !!}</td>
		<td >{!! $p->price !!}</td>

        <td>
			{!! link_to_action('Admin\ProductController@edit',
			'Edit', array($p->id), array('class' => 'badge bg-info')) !!}

        </td>

		<td>{!! Form::open(['method' => 'POST', 'route' => ['product.delete', $p->id]]) !!}
			<a href="" data-toggle="modal" name="activate_delete" data-target=".delete" modal_heading="Alert" modal_msg="Do you want to delete product?">
				<span class="badge bg-info btn-primary ">
					{!! $p->deleted_at?'Activate':'Delete' !!}</span></a>
			{!! Form::close() !!}
		</td>

        <td>
			<div class="myproduct  arrow_{!!$p->id!!}">
                @if($p->promotion)
                {{-- {!! link_to_action('Admin\PromotionController@edit',
			        'Edit', array($p->promotion->id), array('class' => 'badge bg-info')) !!} --}}
				<a href="{{ url('admin/promotion/edit/'.$p->promotion->id) }}" type="button"
					class="btn btn-primary onproduction" id="production">Edit</a>




                    <a href="#"
                     {{-- data-toggle="modal" name="activate_delete" data-target=".delete" modal_heading="Alert" --}}
                    onclick="deleteVideo('{!!$p->promotion->id!!}','{!!$p->id!!}')" class="" >
                        <span class="btn btn-primary onproduction" id="production">Delete</span></a>

                @else
                <a href="{{ url('admin/promotion/edit/0?product_id='.$p->id) }}" type="button"
					class="btn btn-primary onproduction">Add</a>
                @endif

			</div>
		</td>


	</tr>
	@endforeach


</tbody>
@section('pagination')
<span class="pagination pagination-md pull-right">{!! $product->render() !!}</span>
<div class="col-md-3 pull-left">
	<div class="form-group text-center">
		<div>
			{!! Form::open(['method' => 'get', 'route' => ['dashboard']]) !!}
			{!! Form::submit('Cancel', ['class' => 'btn btn-default btn-block btn-lg btn-parsley']) !!}
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection
@stop


@section('app_jquery')
<script>

function deleteVideo(promotion_id,product_id) {
        // var id =$('.deletevideoconfirm').attr('id_delete');

        var my_url = '{!!url("/admin/promotion/delete")!!}/'+promotion_id;
        console.log('deltee url',my_url)
        $.ajax({
                        url: my_url,
                        method: 'POST',
                        dataType: 'json',
                        data: {
                            '_token': '{!! csrf_token() !!}'
                        },
                        success: function(data) {
                            $('.arrow_'+product_id)
                            .html(`<a href="{{ url('admin/promotion/edit/0?product_id=') }}/`+product_id+`" type="button"
					class="btn btn-primary onproduction">Add</a>`);
                            // $(current).parent().parent().parent().remove();

                        },
                        error: function(data) {
                            console.log('Error:', data);
                        }
                    });

    }

</script>

@endsection
