<?php
//views/welcome_page.php
$this->load->view($this->config->item('theme') . 'header');
?>

<div class="panel-home">
    
    <div class="panel-home-body">
        <div id="pl-img-1" class="panel-image left">
            <h1><i class="fa fa-search"></i></h1>    
        </div>  
        <div class="panel-contents">
            <div class="panel-home-heading">
                <h1 class="panel-home-title">Recent Gig</h1>
            </div>
            <ul class="panel-list">
                <li>
                    <a href=""><h4>Web Developer | Seattle </h4></a>
                <p>Need a good developer for cheap. Need a good developer for cheap...</p>
                </li>
                <li>
                    <a href=""><h4>Database Developer | Bellevue</h4></a>
                    <p>In search of starving brilliant students to build my startup...</p>
                </li>
                <li>
                    <a href=""><h4>Python | Seattle</h4></a>
                    <p>Need a good developer for cheap. Need a good developer for cheap...</p>
                </li>
            </ul>
            <div class="panel-control">
                <a><i class="fa fa-arrow-down"></i></a> 
                <a><i class="fa fa-arrow-up"></i></a>
            </div>
        </div>
    </div>
    
</div>

<div class="panel-home">
    
    <div class="panel-home-body">
        <div id="pl-img-2" class="panel-image right">
            <h1><i class="fa fa-users"></i></h1>    
        </div>  
        <div class="panel-contents">
            <div class="panel-home-heading">
                <h1 class="panel-home-title">Featured Profiles</h1>
            </div>
            <ul class="panel-list">
                <li>
                    <a href=""><h4> Dave Earl</h4></a>
                <p>A creative and technically skilled art director and web developer with experience in increasing marketability.</p>
                </li>
                <li>
                    <a href=""><h4>Christine Nyland</h4></a>
                    <p>Freelance Web & Graphic Designer at Christine Nyland Web & Graphic Design</p>
                </li>
                <li>
                    <a href=""><h4>Renata Jegereva</h4></a>
                    <p>Freelance Web Designer/Developer</p>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="panel-home">
    
    <div class="panel-home-body">
        <div id="pl-img-3" class="panel-image left">
            <h1><i class="fa fa-building-o"></i></h1>    
        </div> 
        <div class="panel-contents">
            <div class="panel-home-heading">
                <h1 class="panel-home-title">Startup Venues near you</h1>
            </div>
            <div id="map" style="width: 100%; height: 300px"></div>   
        </div>
    </div>
</div>

<div class="panel-home">
   
    <div class="panel-home-body">
        <div id="pl-img-4" class="panel-image right">
            <h1><i class="fa fa-map-marker"></i></h1>    
        </div>  
        <div class="panel-contents">
             <div class="panel-home-heading">
                <h1 class="panel-home-title">Featured Startup Venue</h1>
            </div>
            <ul class="panel-list">
                <li>
                    <a href=""><h4>Wework | Seattle </h4></a>
                    <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                    <p>BEAUTIFUL WORKSPACES WHEN &amp; WHERE YOU NEED THEM</p>
                </li>
                <li>
                    <a href=""><h4>Ballard labs | Seattle</h4></a>
                    <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></p>
                    <p>Ballard Labs is a co-working space for entrepreneurs.</p>
                </li>
                <li>
                    <a href=""><h4>The Markers Space | Seattle</h4></a>
                    <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></p>
                    <p>At MAKERS we are building the future of work, together.</p>
                </li>
            </ul>
        </div>
    </div>
</div>

<!--Start Startup Map Script -->  
<!--
@See public/phpsqlajax_dbinfo.php
@see public/phpsqlajax_genxml.php
-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
//<![CDATA[

var customIcons = {
  '1': {
    icon: 'http://labs.google.com/ridefinder/images/mm_20_blue.png'
  },
  '2': {
    icon: 'http://labs.google.com/ridefinder/images/mm_20_red.png'
  }
};

/*
//get user's geolocation
if (navigator.geolocation) {
    var location_timeout = setTimeout("geolocFail()", 10000);

    navigator.geolocation.getCurrentPosition(function(position) {
        clearTimeout(location_timeout);

        var lat = position.coords.latitude;
        var lng = position.coords.longitude;

        geocodeLatLng(lat, lng);
    }, function(error) {
        clearTimeout(location_timeout);
        geolocFail();
    });
} else {
    // Fallback for no geolocation
    geolocFail();
} 
*/

$(document).ready(function() {
    
    var map = new google.maps.Map(document.getElementById("map"), {
    center: new google.maps.LatLng(47.6145, -122.3418),
    //center: new google.maps.LatLng(lat, lng),
    zoom: 13,
    mapTypeId: 'roadmap'
    });
    var infoWindow = new google.maps.InfoWindow;

  // Change this depending on the name of your PHP file
  downloadUrl("public/phpsqlajax_genxml.php", function(data) {
    var xml = data.responseXML;
    var markers = xml.documentElement.getElementsByTagName("marker");
    for (var i = 0; i < markers.length; i++) {
        var name = markers[i].getAttribute("name");
        var address = markers[i].getAttribute("address");
        var type = markers[i].getAttribute("type");
        var point = new google.maps.LatLng(
            parseFloat(markers[i].getAttribute("lat")),
            parseFloat(markers[i].getAttribute("lng")));
        var html = "<b>" + name + "</b> <br/>" + address;
        var icon = customIcons[type] || {};
        var marker = new google.maps.Marker({
          map: map,
          position: point,
          icon: icon.icon
      });
      bindInfoWindow(marker, map, infoWindow, html);
    }
  });
});

function bindInfoWindow(marker, map, infoWindow, html) {
  google.maps.event.addListener(marker, 'click', function() {
    infoWindow.setContent(html);
    infoWindow.open(map, marker);
  });
}

function downloadUrl(url, callback) {
  var request = window.ActiveXObject ?
      new ActiveXObject('Microsoft.XMLHTTP') :
      new XMLHttpRequest;

  request.onreadystatechange = function() {
    if (request.readyState == 4) {
      request.onreadystatechange = doNothing;
      callback(request, request.status);
    }
  };

  request.open('GET', url, true);
  request.send(null);
}
    


function doNothing() {}

//]]>

</script>
<!-- End Startup Map Script --->

<?php
$this->load->view($this->config->item('theme') . 'footer');
?>