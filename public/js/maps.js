// In the following example, markers appear when the user clicks on the map.
// The markers are stored in an array.
// The user can then click an option to hide, show or delete the markers.
var map;
var markers = [];
var i= 0,j=0;

function initialize() {

    var haightAshbury = new google.maps.LatLng(4.599524963950523, -74.08407211303711);
    var mapOptions = {
        zoom: 12,
        center: haightAshbury,
        mapTypeId: google.maps.MapTypeId.TERRAIN
    };
    map = new google.maps.Map(document.getElementById('map-canvas'),
        mapOptions);

    // This event listener will call addMarker() when the map is clicked.
    google.maps.event.addListener(map, 'click', function(event) {
        if(i==0)
        {
            addMarker(event.latLng);
            document.getElementById('maps').value=event.latLng;
            $('.maps').val(event.latLng);
        }

    });

    // Adds a marker at the center of the map.
    // addMarker(haightAshbury);
}

// Add a marker to the map and push to the array.
function addMarker(location) {
    if(i==0)
    {
        var marker = new google.maps.Marker({
            position: location,
            map: map
        });

        markers.push(marker);
    }
    i++;
}

// Sets the map on all markers in the array.
function setAllMap(map) {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);

    }
}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
    setAllMap(null);
}

// Shows any markers currently in the array.


// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
    clearMarkers();
    markers = [];
    i=0;
    document.getElementById('maps').value="";
    document.getElementById('map').value="";
}

google.maps.event.addDomListener(window, 'load', initialize);
