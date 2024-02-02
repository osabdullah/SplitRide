<!DOCTYPE html>
<html>
<body>

<h1>Google Map</h1>

<div id="googleMap" style="width:100vw;height:100vh;"></div>

<script>
function initMap() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };
    var locations = [
      ['Melawis Apartment', 1.5443588360743419, 103.62822941534525],
      ['Melana Apartment', 1.5454094112770622, 103.62787480134253],
      ['N28', 1.5643831088460949, 103.63798184418157],
      ['P19A', 1.5633749586488745, 103.64516755767262],
      ['FABU Bus Stop (UTM Center Point)', 1.559886785057329, 103.63473244232738]
      ['Masjid Sultan Ismail, Universiti Teknologi Malaysia', 1.559494984544278, 103.63749581349104]

    ];
   // 1.5588194708529832, 103.63808963807878
    const myLatLng = { lat: 1.5588194708529832, lng: 103.63808963807878 };
    const melvisAppartment={lat:1.5454094112770622,lng:103.62787480134253};
  map = new google.maps.Map(document.getElementById("googleMap"), {
    zoom: 14,
    center: myLatLng,
  });

  new google.maps.Marker({
    position: myLatLng,
    map,
    title: "Universiti Teknologi Malaysia",
  });
//  new google.maps.Marker({
//     position: melvisAppartment,
//     map,
//     title: "Melawis Apartment",
//   });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
}

//window.initMap = initMap;
  //  google.maps.event.addDomListener(window, 'load', initialize);
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCI6WBpLUjnMRXmJipR65ixsQsrJTgpwOw&callback=initMap"></script>
<!-- <div id="allmap"></div> -->
</body>
</html>
