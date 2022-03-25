@extends('layouts.map')
@section('map_functions')

<script>

    $(function(){
        setTimeout(() => {

            set_lat_long_parent('{!!$user->lat!!}','{!!$user->long!!}','{!!$parents_id!!}');
        }, 1000);

    })

    function set_lat_long_parent(latitide,longitude,parents_id){

            console.log('abccc',parents_id)

        console.log('save these lat long to parent ',latitide,longitude)
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
                url: '{!!asset('admin/parent/map/lat_long')!!}',
                method: 'POST',
                data: {
                    '_token': '{!! csrf_token() !!}',
                    'parent_latitide':  latitide  ,
                    'parent_longitude':  longitude ,
                    'parent_id': '{!!$parents_id!!}',
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
