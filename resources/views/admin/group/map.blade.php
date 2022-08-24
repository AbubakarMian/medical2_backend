<!DOCTYPE html>
<html>
  <head>
    <title>Group Map</title>
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
    var geocoder = new google.maps.Geocoder();


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

            console.log('mapsMouseEvent',mapsMouseEvent);
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

      var address_objes =  get_area_detail(mapsMouseEvent);

        console.log('address_objttttttttttttt',address_objes);
        console.log('lat',mapsMouseEvent.latLng.lat());
        console.log('long',mapsMouseEvent.latLng.lng());
        set_lat_long_parent(latitide,longitude);

  
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
// addresss
      async  function get_area_detail(mapsMouseEvent){
        var geocoder =   new google.maps.Geocoder();
        await geocoder.geocode({
                // 'latLng': lat_long//{ lat: 24.961748975600738, lng: 67.06023874305612 }
                'latLng':mapsMouseEvent.latLng
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
              if (results[0]) {
                    console.log('result',results[0]);
                    console.log('result',results[0]);
                    console.log('formatted_address',results[0].formatted_address);
                }
////////

           var level_1; 
            var level_2;
            for (var x = 0, length_1 = results.length; x < length_1; x++){
              for (var y = 0, length_2 = results[x].address_components.length; y < length_2; y++){
                  var type = results[x].address_components[y].types[0];
                    if ( type === "administrative_area_level_1") {
                      level_1 = results[x].address_components[y].long_name;
                    //   if (level_2) break;
                    } else if (type === "locality"){
                      level_2 = results[x].address_components[y].long_name;
                    //   if (level_1) break;
                    }
                }
            }
            console.log('cityyy',level_2);
            console.log('countryy',length_1);
            console.log('addresssss',results[0].formatted_address);
            var address_obj = {
                city:level_2,
                country:length_1,
                address:results[0].formatted_address,
            };
            console.log('address_objsssss',address_obj);
            return address_obj;

            // return level_2;

/////////////
                }
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
              $.ajax({
                url: '{!!asset('admin/group/map/lat_long')!!}',
                method: 'POST',
                data: {
                    '_token': '{!! csrf_token() !!}',
                    'map_latitide':  latitide  ,
                    'map_longitude':  longitude ,
                },
                success: function(data) {
                    if (data.status) {
                        console.log('workingworkingworking',data);
                        console.log('llllatttttt',data.sample_class.lat );
                        console.log('long',data.sample_class.long);

                        var map_lattt = data.sample_class.lat ;
                        var map_longg =data.sample_class.long;
                           
                        // group_lat
                        var input_lat = document.getElementById("group_lats").value = map_lattt;
                       
                        // group_long
                        var input_long =  document.getElementById("group_longs").value =map_longg;
                    
                    } 
                    
                    
                    else { // completed , rejected
                        console.log('notworking');
                    }

                },
                error: function(errordata) {
                    console.log(errordata)
                }
            })



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
