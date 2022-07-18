@extends('layouts.map')
@section('map_functions')

<script>

    $(function(){
        setTimeout(() => {

            set_lat_long_parent();
        }, 1000);

    })

    function set_lat_long_parent(latitide,longitude){

         

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

    


    }


</script>
