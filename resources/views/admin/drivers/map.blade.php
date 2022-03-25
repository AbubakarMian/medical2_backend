@extends('layouts.drivers_map')



{{-- {!!dd($drivers->drivers_parents[0]->parent->user)!!} --}}
@section('map_functions')
<script>

    $(function(){
        setTimeout(() => {
            set_route_on_map();
        }, 2000);

    })

    function set_route_on_map(){
        markers_latlng.push({lat:parseFloat('{!!$settings_lat->value!!}'),lng:parseFloat('{!!$settings_long->value!!}')});

        @foreach ($drivers->drivers_parents as $dp)
            markers_latlng.push({lat:parseFloat('{!!$dp->parent->user->lat!!}'),lng:parseFloat('{!!$dp->parent->user->long!!}')});
        @endforeach

        console.log(markers_latlng);
        calculateAndDisplayRoute();

    // var marker = new google.maps.Marker({
    //     position: {lat:latitide,lng:longitude},
    //     map: map,
    //     id:'marker'
    // });
    // // deleteMarkers();
    // markers.push(marker);
    // markers_latlng.push({lat:latitide,lng:longitude});

    // setTimeout(() => {
    //     calculateAndDisplayRoute();
    // }, 1000);




    }


</script>
@endsection
