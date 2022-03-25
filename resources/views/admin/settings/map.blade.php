@extends('layouts.settings_map')




@section('map_functions')
<script>

$(function(){
        setTimeout(() => {

            set_lat_long_parent('{!!$settings_lat->value!!}','{!!$settings_long->value!!}');
        }, 1000);

    })


    function set_lat_long_parent(latitide,longitude){
// console.log('lat',latitide)


        var lat = latitide;
        var long  = longitude


    var marker = new google.maps.Marker({
        position: {lat:parseFloat(latitide),lng:parseFloat(longitude)},
        map: map,
        id:'marker'
    });

    deleteMarkers();
    markers.push(marker);
    markers_latlng.push({lat:latitide,lng:longitude});


    $.ajax({
                url: '{!!asset('admin/settings/map/lat_long')!!}',
                method: 'POST',
                data: {
                    '_token': '{!! csrf_token() !!}',
                    'settings_latitide':  latitide  ,
                    'settings_longitude':  longitude ,

                },
                success: function(data) {
                    if (data.new_value == 'Deleted') {
                        console.log('working');


                    } else { // completed , rejected
                        console.log('notworking');
                    }

                },
                error: function(errordata) {
                    console.log(errordata)
                }
            })





    }


</script>
@endsection
