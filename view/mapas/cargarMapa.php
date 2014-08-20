<script type="text/javascript">
   $(document).ready(function(){
      /* $('.map').maphilight();*/
    })
</script>

<style type="text/css">
  area:focus
		{ 
		background-color:yellow;
		}
  </style>

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
            //document.getElementById(b1).disabled = true;
            //document.getElementById(b2).disabled = false;
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

           /*if ("AREA"==node.nodeName) {
             alert("You clicked on an area element");
             return false;
           }*/
        }
        document.onclick=doClick;
		
		window.onload=zoomImage(document.getElementById('img1'), .5);
      </script>

<section class="content-header">
	<ol class="breadcrumb">
		<li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Mapas</li>
	</ol>
</section>

<!-- Main content -->
<section class="content" >
	
	 <p>
         <input value="Zoom In" onclick="zoomImage(document.getElementById('img1'), 1.5); swapButtons('zoomin', 'zoomout');" id="zoomin" type="image" src="img/png/zoom-in.png" border=0>
         <input  value="Zoom Out" onclick="zoomImage(document.getElementById('img1'), .8); swapButtons('zoomout', 'zoomin');" id="zoomout" type="image" src="img/png/zoom-out.png" border=0>
      </p>
	<div style="width:500px; height:400px; overflow: scroll;">
		<img id="img1" src="img/mapa/zonas/<?php echo $_POST['codMapa']; ?>.png" width='994' height='994' border="0" class="map" usemap="#mapa" />
		
		<map name="mapa">
			<!-- #$-:Image map file created by GIMP Image Map plug-in -->
			<!-- #$-:GIMP Image Map plug-in by Maurits Rijk -->
			<!-- #$-:Please do not edit lines starting with "#$" -->
			<!-- #$VERSION:2.3 -->
			<!-- #$AUTHOR:bryrodpe    -->
			<area shape="rect" coords="0,0,40,40" href="#a1" onmouseover="this.focus();" onmouseout="this.blur();" />
			<area shape="rect" coords="40,0,80,40" href="#a2" onmouseover="this.style.backgroundColor='#805CA6';" onmouseout="this.style.backgroundColor='transparent';"/>
			<area shape="rect" coords="80,0,120,40" href="#a3" />
			<area shape="rect" coords="120,0,160,40" href="#a4" />
			<area shape="rect" coords="160,0,200,40" href="#a5" />
			<area shape="rect" coords="200,0,240,40" href="#a6" />
			<area shape="rect" coords="240,0,280,40" href="#a7" />
			<area shape="rect" coords="280,0,320,40" href="#a8" />
			<area shape="rect" coords="320,0,360,40" href="#a9" />
			<area shape="rect" coords="360,0,400,40" href="#a10" />
			<area shape="rect" coords="400,0,440,40" href="#a11" />
			<area shape="rect" coords="440,0,480,40" href="#a12" />
			<area shape="rect" coords="480,0,520,40" href="#a13" />
			<area shape="rect" coords="520,0,560,40" href="#a14" />
			<area shape="rect" coords="560,0,600,40" href="#a15" />
			<area shape="rect" coords="600,0,640,40" href="#a16" />
			<area shape="rect" coords="640,0,680,40" href="#a17" />
			<area shape="rect" coords="680,0,720,40" href="#a18" />
			<area shape="rect" coords="720,0,760,40" href="#a19" />
			<area shape="rect" coords="760,0,800,40" href="#a20" />
			<area shape="rect" coords="800,0,840,40" href="#a21" />
			<area shape="rect" coords="840,0,880,40" href="#a22" />
			<area shape="rect" coords="880,0,920,40" href="#a23" />
			<area shape="rect" coords="920,0,960,40" href="#a24" />
			<area shape="rect" coords="960,0,1000,40" href="#a25" />
			<area shape="rect" coords="0,40,40,80" href="#b1" />
			<area shape="rect" coords="40,40,80,80" href="#b2" />
			<area shape="rect" coords="80,40,120,80" href="#b3" />
			<area shape="rect" coords="120,40,160,80" href="#b4" />
			<area shape="rect" coords="160,40,200,80" href="#b5" />
			<area shape="rect" coords="200,40,240,80" href="#b6" />
			<area shape="rect" coords="240,40,280,80" href="#b7" />
			<area shape="rect" coords="280,40,320,80" href="#b8" />
			<area shape="rect" coords="320,40,360,80" href="#b9" />
			<area shape="rect" coords="360,40,400,80" href="#b10" />
			<area shape="rect" coords="400,40,440,80" href="#b11" />
			<area shape="rect" coords="440,40,480,80" href="#b12" />
			<area shape="rect" coords="480,40,520,80" href="#b13" />
			<area shape="rect" coords="520,40,560,80" href="#b14" />
			<area shape="rect" coords="560,40,600,80" href="#b15" />
			<area shape="rect" coords="600,40,640,80" href="#b16" />
			<area shape="rect" coords="640,40,680,80" href="#b17" />
			<area shape="rect" coords="680,40,720,80" href="#b18" />
			<area shape="rect" coords="720,40,760,80" href="#b19" />
			<area shape="rect" coords="760,40,800,80" href="#b20" />
			<area shape="rect" coords="800,40,840,80" href="#b21" />
			<area shape="rect" coords="840,40,880,80" href="#b22" />
			<area shape="rect" coords="880,40,920,80" href="#b23" />
			<area shape="rect" coords="920,40,960,80" href="#b24" />
			<area shape="rect" coords="960,40,1000,80" href="#b25" />
			<area shape="rect" coords="0,80,40,120" href="#c1" />
			<area shape="rect" coords="40,80,80,120" href="#c2" />
			<area shape="rect" coords="80,80,120,120" href="#c3" />
			<area shape="rect" coords="120,80,160,120" href="#c4" />
			<area shape="rect" coords="160,80,200,120" href="#c5" />
			<area shape="rect" coords="200,80,240,120" href="#c6" />
			<area shape="rect" coords="240,80,280,120" href="#c7" />
			<area shape="rect" coords="280,80,320,120" href="#c8" />
			<area shape="rect" coords="320,80,360,120" href="#c9" />
			<area shape="rect" coords="360,80,400,120" href="#c10" />
			<area shape="rect" coords="400,80,440,120" href="#c11" />
			<area shape="rect" coords="440,80,480,120" href="#c12" />
			<area shape="rect" coords="480,80,520,120" href="#c13" />
			<area shape="rect" coords="520,80,560,120" href="#c14" />
			<area shape="rect" coords="560,80,600,120" href="#c15" />
			<area shape="rect" coords="600,80,640,120" href="#c16" />
			<area shape="rect" coords="640,80,680,120" href="#c17" />
			<area shape="rect" coords="680,80,720,120" href="#c18" />
			<area shape="rect" coords="720,80,760,120" href="#c19" />
			<area shape="rect" coords="760,80,800,120" href="#c20" />
			<area shape="rect" coords="800,80,840,120" href="#c21" />
			<area shape="rect" coords="840,80,880,120" href="#c22" />
			<area shape="rect" coords="880,80,920,120" href="#c23" />
			<area shape="rect" coords="920,80,960,120" href="#c24" />
			<area shape="rect" coords="960,80,1000,120" href="#c25" />
			<area shape="rect" coords="0,120,40,160" href="#d1" />
			<area shape="rect" coords="40,120,80,160" href="#d2" />
			<area shape="rect" coords="80,120,120,160" href="#d3" />
			<area shape="rect" coords="120,120,160,160" href="#d4" />
			<area shape="rect" coords="160,120,200,160" href="#d5" />
			<area shape="rect" coords="200,120,240,160" href="#d6" />
			<area shape="rect" coords="240,120,280,160" href="#d7" />
			<area shape="rect" coords="280,120,320,160" href="#d8" />
			<area shape="rect" coords="320,120,360,160" href="#d9" />
			<area shape="rect" coords="360,120,400,160" href="#d10" />
			<area shape="rect" coords="400,120,440,160" href="#d11" />
			<area shape="rect" coords="440,120,480,160" href="#d12" />
			<area shape="rect" coords="480,120,520,160" href="#d13" />
			<area shape="rect" coords="520,120,560,160" href="#d14" />
			<area shape="rect" coords="560,120,600,160" href="#d15" />
			<area shape="rect" coords="600,120,640,160" href="#d16" />
			<area shape="rect" coords="640,120,680,160" href="#d17" />
			<area shape="rect" coords="680,120,720,160" href="#d18" />
			<area shape="rect" coords="720,120,760,160" href="#d19" />
			<area shape="rect" coords="760,120,800,160" href="#d20" />
			<area shape="rect" coords="800,120,840,160" href="#d21" />
			<area shape="rect" coords="840,120,880,160" href="#d22" />
			<area shape="rect" coords="880,120,920,160" href="#d23" />
			<area shape="rect" coords="920,120,960,160" href="#d24" />
			<area shape="rect" coords="960,120,1000,160" href="#d25" />
			<area shape="rect" coords="0,160,40,200" href="#e1" />
			<area shape="rect" coords="40,160,80,200" href="#e2" />
			<area shape="rect" coords="80,160,120,200" href="#e3" />
			<area shape="rect" coords="120,160,160,200" href="#e4" />
			<area shape="rect" coords="160,160,200,200" href="#e5" />
			<area shape="rect" coords="200,160,240,200" href="#e6" />
			<area shape="rect" coords="240,160,280,200" href="#e7" />
			<area shape="rect" coords="280,160,320,200" href="#e8" />
			<area shape="rect" coords="320,160,360,200" href="#e9" />
			<area shape="rect" coords="360,160,400,200" href="#e10" />
			<area shape="rect" coords="400,160,440,200" href="#e11" />
			<area shape="rect" coords="440,160,480,200" href="#e12" />
			<area shape="rect" coords="480,160,520,200" href="#e13" />
			<area shape="rect" coords="520,160,560,200" href="#e14" />
			<area shape="rect" coords="560,160,600,200" href="#e15" />
			<area shape="rect" coords="600,160,640,200" href="#e16" />
			<area shape="rect" coords="640,160,680,200" href="#e17" />
			<area shape="rect" coords="680,160,720,200" href="#e18" />
			<area shape="rect" coords="720,160,760,200" href="#e19" />
			<area shape="rect" coords="760,160,800,200" href="#e20" />
			<area shape="rect" coords="800,160,840,200" href="#e21" />
			<area shape="rect" coords="840,160,880,200" href="#e22" />
			<area shape="rect" coords="880,160,920,200" href="#e23" />
			<area shape="rect" coords="920,160,960,200" href="#e24" />
			<area shape="rect" coords="960,160,1000,200" href="#e25" />
			<area shape="rect" coords="1000,160,1040,200" href="#e26" />
			<area shape="rect" coords="1040,160,1080,200" href="#e27" />
			<area shape="rect" coords="1080,160,1120,200" href="#e28" />
			<area shape="rect" coords="1120,160,1160,200" href="#e29" />
			<area shape="rect" coords="1160,160,1200,200" href="#e30" />
			<area shape="rect" coords="1200,160,1240,200" href="#e31" />
			<area shape="rect" coords="1240,160,1280,200" href="#e32" />
			<area shape="rect" coords="1280,160,1320,200" href="#e33" />
			<area shape="rect" coords="1320,160,1360,200" href="#e34" />
			<area shape="rect" coords="1360,160,1400,200" href="#e35" />
			<area shape="rect" coords="0,200,40,240" href="#f1" />
			<area shape="rect" coords="40,200,80,240" href="#f2" />
			<area shape="rect" coords="80,200,120,240" href="#f3" />
			<area shape="rect" coords="120,200,160,240" href="#f4" />
			<area shape="rect" coords="160,200,200,240" href="#f5" />
			<area shape="rect" coords="200,200,240,240" href="#f6" />
			<area shape="rect" coords="240,200,280,240" href="#f7" />
			<area shape="rect" coords="280,200,320,240" href="#f8" />
			<area shape="rect" coords="320,200,360,240" href="#f9" />
			<area shape="rect" coords="360,200,400,240" href="#f10" />
			<area shape="rect" coords="400,200,440,240" href="#f11" />
			<area shape="rect" coords="440,200,480,240" href="#f12" />
			<area shape="rect" coords="480,200,520,240" href="#f13" />
			<area shape="rect" coords="520,200,560,240" href="#f14" />
			<area shape="rect" coords="560,200,600,240" href="#f15" />
			<area shape="rect" coords="600,200,640,240" href="#f16" />
			<area shape="rect" coords="640,200,680,240" href="#f17" />
			<area shape="rect" coords="680,200,720,240" href="#f18" />
			<area shape="rect" coords="720,200,760,240" href="#f19" />
			<area shape="rect" coords="760,200,800,240" href="#f20" />
			<area shape="rect" coords="800,200,840,240" href="#f21" />
			<area shape="rect" coords="840,200,880,240" href="#f22" />
			<area shape="rect" coords="880,200,920,240" href="#f23" />
			<area shape="rect" coords="920,200,960,240" href="#f24" />
			<area shape="rect" coords="960,200,1000,240" href="#f25" />
			<area shape="rect" coords="0,240,40,280" href="#g1" />
			<area shape="rect" coords="40,240,80,280" href="#g2" />
			<area shape="rect" coords="80,240,120,280" href="#g3" />
			<area shape="rect" coords="120,240,160,280" href="#g4" />
			<area shape="rect" coords="160,240,200,280" href="#g5" />
			<area shape="rect" coords="200,240,240,280" href="#g6" />
			<area shape="rect" coords="240,240,280,280" href="#g7" />
			<area shape="rect" coords="280,240,320,280" href="#g8" />
			<area shape="rect" coords="320,240,360,280" href="#g9" />
			<area shape="rect" coords="360,240,400,280" href="#g10" />
			<area shape="rect" coords="400,240,440,280" href="#g11" />
			<area shape="rect" coords="440,240,480,280" href="#g12" />
			<area shape="rect" coords="480,240,520,280" href="#g13" />
			<area shape="rect" coords="520,240,560,280" href="#g14" />
			<area shape="rect" coords="560,240,600,280" href="#g15" />
			<area shape="rect" coords="600,240,640,280" href="#g16" />
			<area shape="rect" coords="640,240,680,280" href="#g17" />
			<area shape="rect" coords="680,240,720,280" href="#g18" />
			<area shape="rect" coords="720,240,760,280" href="#g19" />
			<area shape="rect" coords="760,240,800,280" href="#g20" />
			<area shape="rect" coords="800,240,840,280" href="#g21" />
			<area shape="rect" coords="840,240,880,280" href="#g22" />
			<area shape="rect" coords="880,240,920,280" href="#g23" />
			<area shape="rect" coords="920,240,960,280" href="#g24" />
			<area shape="rect" coords="960,240,1000,280" href="#g25" />
			<area shape="rect" coords="0,280,40,320" href="#h1" />
			<area shape="rect" coords="40,280,80,320" href="#h2" />
			<area shape="rect" coords="80,280,120,320" href="#h3" />
			<area shape="rect" coords="120,280,160,320" href="#h4" />
			<area shape="rect" coords="160,280,200,320" href="#h5" />
			<area shape="rect" coords="200,280,240,320" href="#h6" />
			<area shape="rect" coords="240,280,280,320" href="#h7" />
			<area shape="rect" coords="280,280,320,320" href="#h8" />
			<area shape="rect" coords="320,280,360,320" href="#h9" />
			<area shape="rect" coords="360,280,400,320" href="#h10" />
			<area shape="rect" coords="400,280,440,320" href="#h11" />
			<area shape="rect" coords="440,280,480,320" href="#h12" />
			<area shape="rect" coords="480,280,520,320" href="#h13" />
			<area shape="rect" coords="520,280,560,320" href="#h14" />
			<area shape="rect" coords="560,280,600,320" href="#h15" />
			<area shape="rect" coords="600,280,640,320" href="#h16" />
			<area shape="rect" coords="640,280,680,320" href="#h17" />
			<area shape="rect" coords="680,280,720,320" href="#h18" />
			<area shape="rect" coords="720,280,760,320" href="#h19" />
			<area shape="rect" coords="760,280,800,320" href="#h20" />
			<area shape="rect" coords="800,280,840,320" href="#h21" />
			<area shape="rect" coords="840,280,880,320" href="#h22" />
			<area shape="rect" coords="880,280,920,320" href="#h23" />
			<area shape="rect" coords="920,280,960,320" href="#h24" />
			<area shape="rect" coords="960,280,1000,320" href="#h25" />
			<area shape="rect" coords="0,320,40,360" href="#i1" />
			<area shape="rect" coords="40,320,80,360" href="#i2" />
			<area shape="rect" coords="80,320,120,360" href="#i3" />
			<area shape="rect" coords="120,320,160,360" href="#i4" />
			<area shape="rect" coords="160,320,200,360" href="#i5" />
			<area shape="rect" coords="200,320,240,360" href="#i6" />
			<area shape="rect" coords="240,320,280,360" href="#i7" />
			<area shape="rect" coords="280,320,320,360" href="#i8" />
			<area shape="rect" coords="320,320,360,360" href="#i9" />
			<area shape="rect" coords="360,320,400,360" href="#i10" />
			<area shape="rect" coords="400,320,440,360" href="#i11" />
			<area shape="rect" coords="440,320,480,360" href="#i12" />
			<area shape="rect" coords="480,320,520,360" href="#i13" />
			<area shape="rect" coords="520,320,560,360" href="#i14" />
			<area shape="rect" coords="560,320,600,360" href="#i15" />
			<area shape="rect" coords="600,320,640,360" href="#i16" />
			<area shape="rect" coords="640,320,680,360" href="#i17" />
			<area shape="rect" coords="680,320,720,360" href="#i18" />
			<area shape="rect" coords="720,320,760,360" href="#i19" />
			<area shape="rect" coords="760,320,800,360" href="#i20" />
			<area shape="rect" coords="800,320,840,360" href="#i21" />
			<area shape="rect" coords="840,320,880,360" href="#i22" />
			<area shape="rect" coords="880,320,920,360" href="#i23" />
			<area shape="rect" coords="920,320,960,360" href="#i24" />
			<area shape="rect" coords="960,320,1000,360" href="#i25" />
			<area shape="rect" coords="0,360,40,400" href="#j1" />
			<area shape="rect" coords="40,360,80,400" href="#j2" />
			<area shape="rect" coords="80,360,120,400" href="#j3" />
			<area shape="rect" coords="120,360,160,400" href="#j4" />
			<area shape="rect" coords="160,360,200,400" href="#j5" />
			<area shape="rect" coords="200,360,240,400" href="#j6" />
			<area shape="rect" coords="240,360,280,400" href="#j7" />
			<area shape="rect" coords="280,360,320,400" href="#j8" />
			<area shape="rect" coords="320,360,360,400" href="#j9" />
			<area shape="rect" coords="360,360,400,400" href="#j10" />
			<area shape="rect" coords="400,360,440,400" href="#j11" />
			<area shape="rect" coords="440,360,480,400" href="#j12" />
			<area shape="rect" coords="480,360,520,400" href="#j13" />
			<area shape="rect" coords="520,360,560,400" href="#j14" />
			<area shape="rect" coords="560,360,600,400" href="#j15" />
			<area shape="rect" coords="600,360,640,400" href="#j16" />
			<area shape="rect" coords="640,360,680,400" href="#j17" />
			<area shape="rect" coords="680,360,720,400" href="#j18" />
			<area shape="rect" coords="720,360,760,400" href="#j19" />
			<area shape="rect" coords="760,360,800,400" href="#j20" />
			<area shape="rect" coords="800,360,840,400" href="#j21" />
			<area shape="rect" coords="840,360,880,400" href="#j22" />
			<area shape="rect" coords="880,360,920,400" href="#j23" />
			<area shape="rect" coords="920,360,960,400" href="#j24" />
			<area shape="rect" coords="960,360,1000,400" href="#j25" />
			<area shape="rect" coords="0,400,40,440" href="#k1" />
			<area shape="rect" coords="40,400,80,440" href="#k2" />
			<area shape="rect" coords="80,400,120,440" href="#k3" />
			<area shape="rect" coords="120,400,160,440" href="#k4" />
			<area shape="rect" coords="160,400,200,440" href="#k5" />
			<area shape="rect" coords="200,400,240,440" href="#k6" />
			<area shape="rect" coords="240,400,280,440" href="#k7" />
			<area shape="rect" coords="280,400,320,440" href="#k8" />
			<area shape="rect" coords="320,400,360,440" href="#k9" />
			<area shape="rect" coords="360,400,400,440" href="#k10" />
			<area shape="rect" coords="400,400,440,440" href="#k11" />
			<area shape="rect" coords="440,400,480,440" href="#k12" />
			<area shape="rect" coords="480,400,520,440" href="#k13" />
			<area shape="rect" coords="520,400,560,440" href="#k14" />
			<area shape="rect" coords="560,400,600,440" href="#k15" />
			<area shape="rect" coords="600,400,640,440" href="#k16" />
			<area shape="rect" coords="640,400,680,440" href="#k17" />
			<area shape="rect" coords="680,400,720,440" href="#k18" />
			<area shape="rect" coords="720,400,760,440" href="#k19" />
			<area shape="rect" coords="760,400,800,440" href="#k20" />
			<area shape="rect" coords="800,400,840,440" href="#k21" />
			<area shape="rect" coords="840,400,880,440" href="#k22" />
			<area shape="rect" coords="880,400,920,440" href="#k23" />
			<area shape="rect" coords="920,400,960,440" href="#k24" />
			<area shape="rect" coords="960,400,1000,440" href="#k25" />
			<area shape="rect" coords="0,440,40,480" href="#l1" />
			<area shape="rect" coords="40,440,80,480" href="#l2" />
			<area shape="rect" coords="80,440,120,480" href="#l3" />
			<area shape="rect" coords="120,440,160,480" href="#l4" />
			<area shape="rect" coords="160,440,200,480" href="#l5" />
			<area shape="rect" coords="200,440,240,480" href="#l6" />
			<area shape="rect" coords="240,440,280,480" href="#l7" />
			<area shape="rect" coords="280,440,320,480" href="#l8" />
			<area shape="rect" coords="320,440,360,480" href="#l9" />
			<area shape="rect" coords="360,440,400,480" href="#l10" />
			<area shape="rect" coords="400,440,440,480" href="#l11" />
			<area shape="rect" coords="440,440,480,480" href="#l12" />
			<area shape="rect" coords="480,440,520,480" href="#l13" />
			<area shape="rect" coords="520,440,560,480" href="#l14" />
			<area shape="rect" coords="560,440,600,480" href="#l15" />
			<area shape="rect" coords="600,440,640,480" href="#l16" />
			<area shape="rect" coords="640,440,680,480" href="#l17" />
			<area shape="rect" coords="680,440,720,480" href="#l18" />
			<area shape="rect" coords="720,440,760,480" href="#l19" />
			<area shape="rect" coords="760,440,800,480" href="#l20" />
			<area shape="rect" coords="800,440,840,480" href="#l21" />
			<area shape="rect" coords="840,440,880,480" href="#l22" />
			<area shape="rect" coords="880,440,920,480" href="#l23" />
			<area shape="rect" coords="920,440,960,480" href="#l24" />
			<area shape="rect" coords="960,440,1000,480" href="#l25" />
			<area shape="rect" coords="0,480,40,520" href="#m1" />
			<area shape="rect" coords="40,480,80,520" href="#m2" />
			<area shape="rect" coords="80,480,120,520" href="#m3" />
			<area shape="rect" coords="120,480,160,520" href="#m4" />
			<area shape="rect" coords="160,480,200,520" href="#m5" />
			<area shape="rect" coords="200,480,240,520" href="#m6" />
			<area shape="rect" coords="240,480,280,520" href="#m7" />
			<area shape="rect" coords="280,480,320,520" href="#m8" />
			<area shape="rect" coords="320,480,360,520" href="#m9" />
			<area shape="rect" coords="360,480,400,520" href="#m10" />
			<area shape="rect" coords="400,480,440,520" href="#m11" />
			<area shape="rect" coords="440,480,480,520" href="#m12" />
			<area shape="rect" coords="480,480,520,520" href="#m13" />
			<area shape="rect" coords="520,480,560,520" href="#m14" />
			<area shape="rect" coords="560,480,600,520" href="#m15" />
			<area shape="rect" coords="600,480,640,520" href="#m16" />
			<area shape="rect" coords="640,480,680,520" href="#m17" />
			<area shape="rect" coords="680,480,720,520" href="#m18" />
			<area shape="rect" coords="720,480,760,520" href="#m19" />
			<area shape="rect" coords="760,480,800,520" href="#m20" />
			<area shape="rect" coords="800,480,840,520" href="#m21" />
			<area shape="rect" coords="840,480,880,520" href="#m22" />
			<area shape="rect" coords="880,480,920,520" href="#m23" />
			<area shape="rect" coords="920,480,960,520" href="#m24" />
			<area shape="rect" coords="960,480,1000,520" href="#m25" />
			<area shape="rect" coords="0,520,40,560" href="#n1" />
			<area shape="rect" coords="40,520,80,560" href="#n2" />
			<area shape="rect" coords="80,520,120,560" href="#n3" />
			<area shape="rect" coords="120,520,160,560" href="#n4" />
			<area shape="rect" coords="160,520,200,560" href="#n5" />
			<area shape="rect" coords="200,520,240,560" href="#n6" />
			<area shape="rect" coords="240,520,280,560" href="#n7" />
			<area shape="rect" coords="280,520,320,560" href="#n8" />
			<area shape="rect" coords="320,520,360,560" href="#n9" />
			<area shape="rect" coords="360,520,400,560" href="#n10" />
			<area shape="rect" coords="400,520,440,560" href="#n11" />
			<area shape="rect" coords="440,520,480,560" href="#n12" />
			<area shape="rect" coords="480,520,520,560" href="#n13" />
			<area shape="rect" coords="520,520,560,560" href="#n14" />
			<area shape="rect" coords="560,520,600,560" href="#n15" />
			<area shape="rect" coords="600,520,640,560" href="#n16" />
			<area shape="rect" coords="640,520,680,560" href="#n17" />
			<area shape="rect" coords="680,520,720,560" href="#n18" />
			<area shape="rect" coords="720,520,760,560" href="#n19" />
			<area shape="rect" coords="760,520,800,560" href="#n20" />
			<area shape="rect" coords="800,520,840,560" href="#n21" />
			<area shape="rect" coords="840,520,880,560" href="#n22" />
			<area shape="rect" coords="880,520,920,560" href="#n23" />
			<area shape="rect" coords="920,520,960,560" href="#n24" />
			<area shape="rect" coords="960,520,1000,560" href="#n25" />
			<area shape="rect" coords="0,560,40,600" href="#o1" />
			<area shape="rect" coords="40,560,80,600" href="#o2" />
			<area shape="rect" coords="80,560,120,600" href="#o3" />
			<area shape="rect" coords="120,560,160,600" href="#o4" />
			<area shape="rect" coords="160,560,200,600" href="#o5" />
			<area shape="rect" coords="200,560,240,600" href="#o6" />
			<area shape="rect" coords="240,560,280,600" href="#o7" />
			<area shape="rect" coords="280,560,320,600" href="#o8" />
			<area shape="rect" coords="320,560,360,600" href="#o9" />
			<area shape="rect" coords="360,560,400,600" href="#o10" />
			<area shape="rect" coords="400,560,440,600" href="#o11" />
			<area shape="rect" coords="440,560,480,600" href="#o12" />
			<area shape="rect" coords="480,560,520,600" href="#o13" />
			<area shape="rect" coords="520,560,560,600" href="#o14" />
			<area shape="rect" coords="560,560,600,600" href="#o15" />
			<area shape="rect" coords="600,560,640,600" href="#o16" />
			<area shape="rect" coords="640,560,680,600" href="#o17" />
			<area shape="rect" coords="680,560,720,600" href="#o18" />
			<area shape="rect" coords="720,560,760,600" href="#o19" />
			<area shape="rect" coords="760,560,800,600" href="#o20" />
			<area shape="rect" coords="800,560,840,600" href="#o21" />
			<area shape="rect" coords="840,560,880,600" href="#o22" />
			<area shape="rect" coords="880,560,920,600" href="#o23" />
			<area shape="rect" coords="920,560,960,600" href="#o24" />
			<area shape="rect" coords="960,560,1000,600" href="#o25" />
			<area shape="rect" coords="0,600,40,640" href="#p1" />
			<area shape="rect" coords="40,600,80,640" href="#p2" />
			<area shape="rect" coords="80,600,120,640" href="#p3" />
			<area shape="rect" coords="120,600,160,640" href="#p4" />
			<area shape="rect" coords="160,600,200,640" href="#p5" />
			<area shape="rect" coords="200,600,240,640" href="#p6" />
			<area shape="rect" coords="240,600,280,640" href="#p7" />
			<area shape="rect" coords="280,600,320,640" href="#p8" />
			<area shape="rect" coords="320,600,360,640" href="#p9" />
			<area shape="rect" coords="360,600,400,640" href="#p10" />
			<area shape="rect" coords="400,600,440,640" href="#p11" />
			<area shape="rect" coords="440,600,480,640" href="#p12" />
			<area shape="rect" coords="480,600,520,640" href="#p13" />
			<area shape="rect" coords="520,600,560,640" href="#p14" />
			<area shape="rect" coords="560,600,600,640" href="#p15" />
			<area shape="rect" coords="600,600,640,640" href="#p16" />
			<area shape="rect" coords="640,600,680,640" href="#p17" />
			<area shape="rect" coords="680,600,720,640" href="#p18" />
			<area shape="rect" coords="720,600,760,640" href="#p19" />
			<area shape="rect" coords="760,600,800,640" href="#p20" />
			<area shape="rect" coords="800,600,840,640" href="#p21" />
			<area shape="rect" coords="840,600,880,640" href="#p22" />
			<area shape="rect" coords="880,600,920,640" href="#p23" />
			<area shape="rect" coords="920,600,960,640" href="#p24" />
			<area shape="rect" coords="960,600,1000,640" href="#p25" />
			<area shape="rect" coords="0,640,40,680" href="#q1" />
			<area shape="rect" coords="40,640,80,680" href="#q2" />
			<area shape="rect" coords="80,640,120,680" href="#q3" />
			<area shape="rect" coords="120,640,160,680" href="#q4" />
			<area shape="rect" coords="160,640,200,680" href="#q5" />
			<area shape="rect" coords="200,640,240,680" href="#q6" />
			<area shape="rect" coords="240,640,280,680" href="#q7" />
			<area shape="rect" coords="280,640,320,680" href="#q8" />
			<area shape="rect" coords="320,640,360,680" href="#q9" />
			<area shape="rect" coords="360,640,400,680" href="#q10" />
			<area shape="rect" coords="400,640,440,680" href="#q11" />
			<area shape="rect" coords="440,640,480,680" href="#q12" />
			<area shape="rect" coords="480,640,520,680" href="#q13" />
			<area shape="rect" coords="520,640,560,680" href="#q14" />
			<area shape="rect" coords="560,640,600,680" href="#q15" />
			<area shape="rect" coords="600,640,640,680" href="#q16" />
			<area shape="rect" coords="640,640,680,680" href="#q17" />
			<area shape="rect" coords="680,640,720,680" href="#q18" />
			<area shape="rect" coords="720,640,760,680" href="#q19" />
			<area shape="rect" coords="760,640,800,680" href="#q20" />
			<area shape="rect" coords="800,640,840,680" href="#q21" />
			<area shape="rect" coords="840,640,880,680" href="#q22" />
			<area shape="rect" coords="880,640,920,680" href="#q23" />
			<area shape="rect" coords="920,640,960,680" href="#q24" />
			<area shape="rect" coords="960,640,1000,680" href="#q25" />
			<area shape="rect" coords="0,680,40,720" href="#r1" />
			<area shape="rect" coords="40,680,80,720" href="#r2" />
			<area shape="rect" coords="80,680,120,720" href="#r3" />
			<area shape="rect" coords="120,680,160,720" href="#r4" />
			<area shape="rect" coords="160,680,200,720" href="#r5" />
			<area shape="rect" coords="200,680,240,720" href="#r6" />
			<area shape="rect" coords="240,680,280,720" href="#r7" />
			<area shape="rect" coords="280,680,320,720" href="#r8" />
			<area shape="rect" coords="320,680,360,720" href="#r9" />
			<area shape="rect" coords="360,680,400,720" href="#r10" />
			<area shape="rect" coords="400,680,440,720" href="#r11" />
			<area shape="rect" coords="440,680,480,720" href="#r12" />
			<area shape="rect" coords="480,680,520,720" href="#r13" />
			<area shape="rect" coords="520,680,560,720" href="#r14" />
			<area shape="rect" coords="560,680,600,720" href="#r15" />
			<area shape="rect" coords="600,680,640,720" href="#r16" />
			<area shape="rect" coords="640,680,680,720" href="#r17" />
			<area shape="rect" coords="680,680,720,720" href="#r18" />
			<area shape="rect" coords="720,680,760,720" href="#r19" />
			<area shape="rect" coords="760,680,800,720" href="#r20" />
			<area shape="rect" coords="800,680,840,720" href="#r21" />
			<area shape="rect" coords="840,680,880,720" href="#r22" />
			<area shape="rect" coords="880,680,920,720" href="#r23" />
			<area shape="rect" coords="920,680,960,720" href="#r24" />
			<area shape="rect" coords="960,680,1000,720" href="#r25" />
			<area shape="rect" coords="0,720,40,760" href="#s1" />
			<area shape="rect" coords="40,720,80,760" href="#s2" />
			<area shape="rect" coords="80,720,120,760" href="#s3" />
			<area shape="rect" coords="120,720,160,760" href="#s4" />
			<area shape="rect" coords="160,720,200,760" href="#s5" />
			<area shape="rect" coords="200,720,240,760" href="#s6" />
			<area shape="rect" coords="240,720,280,760" href="#s7" />
			<area shape="rect" coords="280,720,320,760" href="#s8" />
			<area shape="rect" coords="320,720,360,760" href="#s9" />
			<area shape="rect" coords="360,720,400,760" href="#s10" />
			<area shape="rect" coords="400,720,440,760" href="#s11" />
			<area shape="rect" coords="440,720,480,760" href="#s12" />
			<area shape="rect" coords="480,720,520,760" href="#s13" />
			<area shape="rect" coords="520,720,560,760" href="#s14" />
			<area shape="rect" coords="560,720,600,760" href="#s15" />
			<area shape="rect" coords="600,720,640,760" href="#s16" />
			<area shape="rect" coords="640,720,680,760" href="#s17" />
			<area shape="rect" coords="680,720,720,760" href="#s18" />
			<area shape="rect" coords="720,720,760,760" href="#s19" />
			<area shape="rect" coords="760,720,800,760" href="#s20" />
			<area shape="rect" coords="800,720,840,760" href="#s21" />
			<area shape="rect" coords="840,720,880,760" href="#s22" />
			<area shape="rect" coords="880,720,920,760" href="#s23" />
			<area shape="rect" coords="920,720,960,760" href="#s24" />
			<area shape="rect" coords="960,720,1000,760" href="#s25" />
			<area shape="rect" coords="0,760,40,800" href="#t1" />
			<area shape="rect" coords="40,760,80,800" href="#t2" />
			<area shape="rect" coords="80,760,120,800" href="#t3" />
			<area shape="rect" coords="120,760,160,800" href="#t4" />
			<area shape="rect" coords="160,760,200,800" href="#t5" />
			<area shape="rect" coords="200,760,240,800" href="#t6" />
			<area shape="rect" coords="240,760,280,800" href="#t7" />
			<area shape="rect" coords="280,760,320,800" href="#t8" />
			<area shape="rect" coords="320,760,360,800" href="#t9" />
			<area shape="rect" coords="360,760,400,800" href="#t10" />
			<area shape="rect" coords="400,760,440,800" href="#t11" />
			<area shape="rect" coords="440,760,480,800" href="#t12" />
			<area shape="rect" coords="480,760,520,800" href="#t13" />
			<area shape="rect" coords="520,760,560,800" href="#t14" />
			<area shape="rect" coords="560,760,600,800" href="#t15" />
			<area shape="rect" coords="600,760,640,800" href="#t16" />
			<area shape="rect" coords="640,760,680,800" href="#t17" />
			<area shape="rect" coords="680,760,720,800" href="#t18" />
			<area shape="rect" coords="720,760,760,800" href="#t19" />
			<area shape="rect" coords="760,760,800,800" href="#t20" />
			<area shape="rect" coords="800,760,840,800" href="#t21" />
			<area shape="rect" coords="840,760,880,800" href="#t22" />
			<area shape="rect" coords="880,760,920,800" href="#t23" />
			<area shape="rect" coords="920,760,960,800" href="#t24" />
			<area shape="rect" coords="960,760,1000,800" href="#t25" />
			<area shape="rect" coords="0,800,40,840" href="#u1" />
			<area shape="rect" coords="40,800,80,840" href="#u2" />
			<area shape="rect" coords="80,800,120,840" href="#u3" />
			<area shape="rect" coords="120,800,160,840" href="#u4" />
			<area shape="rect" coords="160,800,200,840" href="#u5" />
			<area shape="rect" coords="200,800,240,840" href="#u6" />
			<area shape="rect" coords="240,800,280,840" href="#u7" />
			<area shape="rect" coords="280,800,320,840" href="#u8" />
			<area shape="rect" coords="320,800,360,840" href="#u9" />
			<area shape="rect" coords="360,800,400,840" href="#u10" />
			<area shape="rect" coords="400,800,440,840" href="#u11" />
			<area shape="rect" coords="440,800,480,840" href="#u12" />
			<area shape="rect" coords="480,800,520,840" href="#u13" />
			<area shape="rect" coords="520,800,560,840" href="#u14" />
			<area shape="rect" coords="560,800,600,840" href="#u15" />
			<area shape="rect" coords="600,800,640,840" href="#u16" />
			<area shape="rect" coords="640,800,680,840" href="#u17" />
			<area shape="rect" coords="680,800,720,840" href="#u18" />
			<area shape="rect" coords="720,800,760,840" href="#u19" />
			<area shape="rect" coords="760,800,800,840" href="#u20" />
			<area shape="rect" coords="800,800,840,840" href="#u21" />
			<area shape="rect" coords="840,800,880,840" href="#u22" />
			<area shape="rect" coords="880,800,920,840" href="#u23" />
			<area shape="rect" coords="920,800,960,840" href="#u24" />
			<area shape="rect" coords="960,800,1000,840" href="#u25" />
			<area shape="rect" coords="0,840,40,880" href="#v1" />
			<area shape="rect" coords="40,840,80,880" href="#v2" />
			<area shape="rect" coords="80,840,120,880" href="#v3" />
			<area shape="rect" coords="120,840,160,880" href="#v4" />
			<area shape="rect" coords="160,840,200,880" href="#v5" />
			<area shape="rect" coords="200,840,240,880" href="#v6" />
			<area shape="rect" coords="240,840,280,880" href="#v7" />
			<area shape="rect" coords="280,840,320,880" href="#v8" />
			<area shape="rect" coords="320,840,360,880" href="#v9" />
			<area shape="rect" coords="360,840,400,880" href="#v10" />
			<area shape="rect" coords="400,840,440,880" href="#v11" />
			<area shape="rect" coords="440,840,480,880" href="#v12" />
			<area shape="rect" coords="480,840,520,880" href="#v13" />
			<area shape="rect" coords="520,840,560,880" href="#v14" />
			<area shape="rect" coords="560,840,600,880" href="#v15" />
			<area shape="rect" coords="600,840,640,880" href="#v16" />
			<area shape="rect" coords="640,840,680,880" href="#v17" />
			<area shape="rect" coords="680,840,720,880" href="#v18" />
			<area shape="rect" coords="720,840,760,880" href="#v19" />
			<area shape="rect" coords="760,840,800,880" href="#v20" />
			<area shape="rect" coords="800,840,840,880" href="#v21" />
			<area shape="rect" coords="840,840,880,880" href="#v22" />
			<area shape="rect" coords="880,840,920,880" href="#v23" />
			<area shape="rect" coords="920,840,960,880" href="#v24" />
			<area shape="rect" coords="960,840,1000,880" href="#v25" />
			<area shape="rect" coords="0,880,40,920" href="#w1" />
			<area shape="rect" coords="40,880,80,920" href="#w2" />
			<area shape="rect" coords="80,880,120,920" href="#w3" />
			<area shape="rect" coords="120,880,160,920" href="#w4" />
			<area shape="rect" coords="160,880,200,920" href="#w5" />
			<area shape="rect" coords="200,880,240,920" href="#w6" />
			<area shape="rect" coords="240,880,280,920" href="#w7" />
			<area shape="rect" coords="280,880,320,920" href="#w8" />
			<area shape="rect" coords="320,880,360,920" href="#w9" />
			<area shape="rect" coords="360,880,400,920" href="#w10" />
			<area shape="rect" coords="400,880,440,920" href="#w11" />
			<area shape="rect" coords="440,880,480,920" href="#w12" />
			<area shape="rect" coords="480,880,520,920" href="#w13" />
			<area shape="rect" coords="520,880,560,920" href="#w14" />
			<area shape="rect" coords="560,880,600,920" href="#w15" />
			<area shape="rect" coords="600,880,640,920" href="#w16" />
			<area shape="rect" coords="640,880,680,920" href="#w17" />
			<area shape="rect" coords="680,880,720,920" href="#w18" />
			<area shape="rect" coords="720,880,760,920" href="#w19" />
			<area shape="rect" coords="760,880,800,920" href="#w20" />
			<area shape="rect" coords="800,880,840,920" href="#w21" />
			<area shape="rect" coords="840,880,880,920" href="#w22" />
			<area shape="rect" coords="880,880,920,920" href="#w23" />
			<area shape="rect" coords="920,880,960,920" href="#w24" />
			<area shape="rect" coords="960,880,1000,920" href="#w25" />
			<area shape="rect" coords="0,920,40,960" href="#x1" />
			<area shape="rect" coords="40,920,80,960" href="#x2" />
			<area shape="rect" coords="80,920,120,960" href="#x3" />
			<area shape="rect" coords="120,920,160,960" href="#x4" />
			<area shape="rect" coords="160,920,200,960" href="#x5" />
			<area shape="rect" coords="200,920,240,960" href="#x6" />
			<area shape="rect" coords="240,920,280,960" href="#x7" />
			<area shape="rect" coords="280,920,320,960" href="#x8" />
			<area shape="rect" coords="320,920,360,960" href="#x9" />
			<area shape="rect" coords="360,920,400,960" href="#x10" />
			<area shape="rect" coords="400,920,440,960" href="#x11" />
			<area shape="rect" coords="440,920,480,960" href="#x12" />
			<area shape="rect" coords="480,920,520,960" href="#x13" />
			<area shape="rect" coords="520,920,560,960" href="#x14" />
			<area shape="rect" coords="560,920,600,960" href="#x15" />
			<area shape="rect" coords="600,920,640,960" href="#x16" />
			<area shape="rect" coords="640,920,680,960" href="#x17" />
			<area shape="rect" coords="680,920,720,960" href="#x18" />
			<area shape="rect" coords="720,920,760,960" href="#x19" />
			<area shape="rect" coords="760,920,800,960" href="#x20" />
			<area shape="rect" coords="800,920,840,960" href="#x21" />
			<area shape="rect" coords="840,920,880,960" href="#x22" />
			<area shape="rect" coords="880,920,920,960" href="#x23" />
			<area shape="rect" coords="920,920,960,960" href="#x24" />
			<area shape="rect" coords="960,920,1000,960" href="#x25" />
			<area shape="rect" coords="0,960,40,1000" href="#y1" />
			<area shape="rect" coords="40,960,80,1000" href="#y2" />
			<area shape="rect" coords="80,960,120,1000" href="#y3" />
			<area shape="rect" coords="120,960,160,1000" href="#y4" />
			<area shape="rect" coords="160,960,200,1000" href="#y5" />
			<area shape="rect" coords="200,960,240,1000" href="#y6" />
			<area shape="rect" coords="240,960,280,1000" href="#y7" />
			<area shape="rect" coords="280,960,320,1000" href="#y8" />
			<area shape="rect" coords="320,960,360,1000" href="#y9" />
			<area shape="rect" coords="360,960,400,1000" href="#y10" />
			<area shape="rect" coords="400,960,440,1000" href="#y11" />
			<area shape="rect" coords="440,960,480,1000" href="#y12" />
			<area shape="rect" coords="480,960,520,1000" href="#y13" />
			<area shape="rect" coords="520,960,560,1000" href="#y14" />
			<area shape="rect" coords="560,960,600,1000" href="#y15" />
			<area shape="rect" coords="600,960,640,1000" href="#y16" />
			<area shape="rect" coords="640,960,680,1000" href="#y17" />
			<area shape="rect" coords="680,960,720,1000" href="#y18" />
			<area shape="rect" coords="720,960,760,1000" href="#y19" />
			<area shape="rect" coords="760,960,800,1000" href="#y20" />
			<area shape="rect" coords="800,960,840,1000" href="#y21" />
			<area shape="rect" coords="840,960,880,1000" href="#y22" />
			<area shape="rect" coords="880,960,920,1000" href="#y23" />
			<area shape="rect" coords="920,960,960,1000" href="#y24" />
			<area shape="rect" coords="960,960,1000,1000" href="#y25" />
		</map>
	</div><!-- ./col -->
	
	
</div>
</section><!-- /.content -->