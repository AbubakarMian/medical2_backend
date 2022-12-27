@extends('layouts.default_module')
@section('module_name')
    Settings and Sliders
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


            <th>Page Name</th>
            <th>Section </th>


            <th>Edit </th>



        </tr>
    </thead>
    <tbody>



        @foreach ($pages_images as $p)
            <td>{!! ucwords($p->page_name) !!}</td>
            <td>{!! ucwords($p->section) !!}</td>
            <?php if (!$p->image) {
                $new_img = asset('images/logo.png');
                $p->image = json_decode($new_img);
            }

            ?>


            {{-- <td><img width="100px" src="{!! json_decode($p->image)  !!}" class="show-product-img imgshow"></td> --}}



            <td>
                {!! link_to_action('Admin\SettingsController@edit', 'Edit', [$p->id], ['class' => 'badge bg-info']) !!}

            </td>

            </div>
            </td>


            </tr>
        @endforeach


    </tbody>
@section('pagination')
    <span class="pagination pagination-md pull-right">{!! $pages_images->render() !!}</span>
    <div class="col-md-3 pull-left">
        <div class="form-group text-center">

        </div>
    </div>
@endsection
@stop


@section('app_jquery')
<script>
    function deleteVideo(promotion_id, product_id) {
        // var id =$('.deletevideoconfirm').attr('id_delete');

        var my_url = '{!! url('/admin/promotion/delete') !!}/' + promotion_id;
        console.log('deltee url', my_url)
        $.ajax({
            url: my_url,
            method: 'POST',
            dataType: 'json',
            data: {
                '_token': '{!! csrf_token() !!}'
            },
            success: function(data) {
                $('.arrow_' + product_id)
                    .html(`<a href="{{ url('admin/promotion/edit/0?product_id=') }}/` + product_id + `" type="button"
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
