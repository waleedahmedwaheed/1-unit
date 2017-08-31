//intialize the map
function initialize() {
  var mapOptions = {
    zoom: 13,
    center: new google.maps.LatLng(39.29000, -76.5000)
};

var map = new google.maps.Map(document.getElementById('map-canvas-one-pin'),
      mapOptions);


// MARKERS
/****************************************************************/

//add a marker1
var marker = new google.maps.Marker({
    position: map.getCenter(),
    map: map,
    icon: 'images/pin.png'
});



// INFO BOXES
/****************************************************************/

//show info box for marker1
var contentString = '<div class="info-box"><img src="images/home3.jpg" style="max-width:100%; margin-bottom:10px;" alt="" /><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in ultrices metus' + 
                    ' sit amet.</p></div>';

var infowindow = new google.maps.InfoWindow({ content: contentString });

google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });

}

google.maps.event.addDomListener(window, 'load', initialize);