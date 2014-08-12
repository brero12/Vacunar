<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
<title>Dynamically Scaling Image Maps</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   
<script type="text/javascript">
         function getMap(elImage) {
            // Be sure a map is specified for the image.
            if (null != elImage.getAttribute('usemap')) {
               // Remove the leading # from the bookmark.
               var strMap = elImage.getAttribute('usemap').substring(1);
               // Return the element with the specified name.
               return strMap;
            }
               return null;
         }

         function zoomImage(elImage, amount) {
            // Expand the image the specified amount.
            var elMap = getMap(elImage);
            elImage.width *= amount;
            elImage.height *= amount;
            // If an image map is available, scale it too.
            if (null != elMap) {
               elMap=document.getElementsByName(elMap)[0];
               for (var intLoop = 0; intLoop < elMap.areas.length; intLoop++) {
                  var elArea = elMap.areas[intLoop];
                  // Break the coordinates string into an array.
                  var coords = elArea.coords.split(",");
                  var scaledCoords = "";
                  // Rebuild the new scaled string.
                  for (coord in coords) {
                     scaledCoords += (coords[coord] * amount) + ",";
                  }

                  // Put the scaled coordinates back into the map.
                  elArea.coords = scaledCoords;
               }
            }
         }

         function swapButtons(b1, b2) {
            // Swap the enabled/disabled buttons.
            document.getElementById(b1).disabled = true;
            document.getElementById(b2).disabled = false;
         }
         function doClick(e) {
         	var node=null;
            if(!e) { // IE
            	e=window.event;
                node=e.srcElement;
                }
			else {
                node = e.target;
                while(node.nodeType != node.ELEMENT_NODE) {
                    node = node.parentNode;
                    }
                }                

           if ("AREA"==node.nodeName) {
             alert("You clicked on an area element");
             return false;
           }
        }
        document.onclick=doClick;
      </script>
   </head><body>
      <p>
         <input value="Zoom In" onclick="zoomImage(document.getElementById('img1'), 2); swapButtons('zoomin', 'zoomout');" id="zoomin" type="button">
         <input disabled="disabled" value="Zoom Out" onclick="zoomImage(document.getElementById('img1'), .5); swapButtons('zoomout', 'zoomin');" id="zoomout" type="button">
      </p>
      <p>
         <img src="zoom_files/places.gif" id="img1" usemap="#map1" width="197" height="448">
         <map name="map1">
      	 <area shape="poly" href="http://www.insidedhtml.com/dhtml/ch9/chapter/samples/map1/california.htm" coords="14, 204, 18, 200, 83, 209, 79, 278, 166, 386, 171, 403, 167, 409, 166, 419, 163, 423, 164, 430, 166, 436, 161, 439, 115, 438, 112, 433, 110, 420, 97, 409, 92, 401, 82, 399, 77, 392, 56, 385, 54, 369, 46, 357, 46, 352, 34, 338, 39, 327,                35, 322, 32, 309, 34, 297, 25, 297, 24, 288, 14, 273, 15, 255, 9, 235, 12, 224, 12, 221, 16, 216">
         <area shape="poly" href="http://www.insidedhtml.com/dhtml/ch9/chapter/samples/map1/oregon.htm" coords="16, 199, 136, 216, 140, 178, 143, 171, 138, 164, 153, 132, 147, 122, 103, 120, 80, 123, 72, 121, 55, 121, 51, 109, 37, 105, 22, 163, 23, 166, 18, 173, 14, 189">
         <area shape="poly" href="http://www.insidedhtml.com/dhtml/ch9/chapter/samples/map1/washington.htm" coords="33, 50, 64, 64, 57, 74, 57, 86, 63, 81, 70, 65, 66, 41, 152, 55, 147, 123, 100, 119, 86, 124, 74, 120, 56, 119, 51, 108, 40, 104, 36, 99, 43, 93, 37, 87, 41, 84, 36, 80">
         </map>
      </p>
   </body>
   </html>