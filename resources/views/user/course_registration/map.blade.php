<!DOCTYPE html>
<html>
  <head>
    <title>Map</title>
    <script src="{{ asset('theme/vendor/jquery/dist/jquery.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <style type="text/css">
      #right-panel {
        font-family: "Roboto", "sans-serif";
        line-height: 30px;
        padding-left: 10px;
      }

      #right-panel select,
      #right-panel input {
        font-size: 15px;
      }

      #right-panel select {
        width: 100%;
      }

      #right-panel i {
        font-size: 12px;
      }

      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

      #map {
        height: 100%;
        float: left;
        width: 100%;
      }

      #right-panel {
        margin: 20px;
        border-width: 2px;
        width: 20%;
        height: 400px;
        float: left;
        text-align: left;
        padding-top: 0;
      }

      #directions-panel {
        margin-top: 10px;
        background-color: #ffee77;
        padding: 10px;
        overflow: scroll;
        height: 174px;
      }
    </style>

    <script>

    var markers = [];
    var markers_latlng = [];
    var map;

    var directionsService;
    var directionsRenderer;


      function initMap() {

         directionsService = new google.maps.DirectionsService();
         directionsRenderer = new google.maps.DirectionsRenderer();


        // var myLatlng = { lat: 24.860966, lng: 66.990501 };
        var myLatlng = { lat: 24.961748975600738, lng: 67.06023874305612 };

         map = new google.maps.Map(document.getElementById("map"), {
          zoom: 19,
          center: myLatlng,
        });
        directionsRenderer.setMap(map);
        // document.getElementById("submit").addEventListener("click", () => {
        //   calculateAndDisplayRoute(directionsService, directionsRenderer);
        // });

        // Create the initial InfoWindow.
        let infoWindow = new google.maps.InfoWindow({
            content: "Click the map to get Lat/Lng!",
            position: myLatlng,
        });
        // infoWindow.open(map);
        // placeMarker(myLatlng,map);

        map.addListener("click", (mapsMouseEvent) => {
            placeMarker(mapsMouseEvent.latLng,map);
            // calculateAndDisplayRoute();
        // Close the current InfoWindow.
        // infoWindow.close();
        // Create a new InfoWindow.
        infoWindow = new google.maps.InfoWindow({
        position: mapsMouseEvent.latLng,
        });

        var latitide = mapsMouseEvent.latLng.lat();
        var longitude = mapsMouseEvent.latLng.lng();

        myLatlng = mapsMouseEvent.latLng;
        console.log('lat',mapsMouseEvent.latLng.lat());
        console.log('long',mapsMouseEvent.latLng.lng());
        set_lat_long_parent(latitide,longitude);

        // $('#lat').val(latitide);
        // $('#long').val(longitude);
        console.log('myLatlng',myLatlng);
        // var marker = new google.maps.Marker({
        // // The below line is equivalent to writing:
        // // position: new google.maps.LatLng(-34.397, 150.644)
        // position: {lat: mapsMouseEvent.latLng.lat(), lng: mapsMouseEvent.latLng.lng() },
        // map: map,
        // // id:'marker1'
        // });
        infoWindow.setContent(
        JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
        );
        // infoWindow.open(map);
        });

      }

      //  open  //  close set_lat_long_parent function
            function set_lat_long_parent(latitide,longitude){

              console.log('abccc')

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
              $(function(){
        setTimeout(() => {
            set_route_on_map();
        }, 2000);

    })
    function set_route_on_map(){
        markers_latlng.push({lat:parseFloat('{!!$lat!!}'),lng:parseFloat('{!!$long!!}')});
        console.log('aaaaaaaaaaaaa',markers_latlng);
         calculateAndDisplayRoute();




    }
    function calculateAndDisplayRoute() {
        var waypts = [];
        var start , end;
        const checkboxArray = document.getElementById("waypoints");
        if(markers_latlng.length < 2){
          return;
        }

        for (let i = 0; i < markers_latlng.length; i++) {
          console.log('asdasd',markers_latlng);
          if (i == 0 ) {
            start = markers_latlng[0];
            continue;
          }
          else if(i == (markers_latlng.length - 1)){
            end = markers_latlng[(markers_latlng.length - 1)];
          }
          else{
            waypts.push({
              location: markers_latlng[i],
              stopover: true,
            });
          }

          }

        directionsService.route(
          {
            origin: start,
            destination: end,
            waypoints: waypts,
            optimizeWaypoints: true,
            travelMode: google.maps.TravelMode.DRIVING,
          },
          (response, status) => {
            if (status === "OK" && response) {
              directionsRenderer.setDirections(response);
              const route = response.routes[0];
            //   const summaryPanel = document.getElementById("directions-panel");
            //   summaryPanel.innerHTML = "";
                console.log('direction ok');
            } else {
              window.alert("Directions request failed due to " + status);
            }
          }
        );
      }


      //  close set_lat_long_parent function
      function placeMarker(location) {
    var marker = new google.maps.Marker({
        position: location,
        map: map,
        id:'marker '
        // id:'marker'+location.lat()+location.lng()
    });
    deleteMarkers();
    markers.push(marker);
    markers_latlng.push({lat:location.lat(),lng:location.lng()});
    // map.panTo(location);
    }
    function clearMarkers() {
        setMapOnAll(null);
    }
    function setMapOnAll(map) {
        for (let i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
        }
    }
    function deleteMarkers() {
        clearMarkers();
        markers.pop();
        setMapOnAll(map);
    }

      function calculateAndDisplayRoute() {
        var waypts = [];
        var start , end;
        const checkboxArray = document.getElementById("waypoints");
        if(markers_latlng.length < 2){
          return;
        }

        for (let i = 0; i < markers_latlng.length; i++) {
          console.log('asdasd',markers_latlng);
          if (i == 0 ) {
            start = markers_latlng[0];
            continue;
          }
          else if(i == (markers_latlng.length - 1)){
            end = markers_latlng[(markers_latlng.length - 1)];
          }
          else{
            waypts.push({
              location: markers_latlng[i],
              stopover: true,
            });
          }

          }

        directionsService.route(
          {
            origin: start,
            destination: end,
            waypoints: waypts,
            optimizeWaypoints: true,
            travelMode: google.maps.TravelMode.DRIVING,
          },
          (response, status) => {
            if (status === "OK" && response) {
              directionsRenderer.setDirections(response);
              const route = response.routes[0];
            //   const summaryPanel = document.getElementById("directions-panel");
            //   summaryPanel.innerHTML = "";
                console.log('direction ok');
            } else {
              window.alert("Directions request failed due to " + status);
            }
          }
        );
      }

    </script>
  </head>
  <body>
    <div id="map"></div>


    <button onclick="clearMarkers()">RemoveMarker</button>
    {{-- <div id="right-panel">
      <div id="directions-panel" style="display: none"></div>
    </div> --}}

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->


    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMwD9jQSMyeJhuZfpMtlD6idB499MbMNI&callback=initMap&libraries=&v=weekly"
      async
    ></script>
    @yield('map_functions')

  </body>
</html>


<!-- <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMwD9jQSMyeJhuZfpMtlD6idB499MbMNI&libraries=places&callback=initAutocomplete"
        async defer></script> -->
