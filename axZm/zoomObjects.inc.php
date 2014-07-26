<?php
/**
* Plugin: jQuery AJAX-ZOOM, zoomObjects.inc.php
* Copyright: Copyright (c) 2010-2013 Vadim Jacobi
* License Agreement: http://www.ajax-zoom.com/index.php?cid=download
* Version: 4.1.5
* Date: 2014-04-06
* URL: http://www.ajax-zoom.com
* Documentation: http://www.ajax-zoom.com/index.php?cid=docs
*/

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//// Ducumentation about this file can be found here: http://www.ajax-zoom.com/index.php?cid=docs#zoomObjects ////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(!session_id()){session_start();}

///////////////////////////////////////////
//// STEP 1 - DEFINING THE IMAGE ARRAY ////
///////////////////////////////////////////

if (isset($_GET['zoomData'])){
	
	// Check validity of the passed file name
	if (isset($_GET['zoomFile'])){
		
		if (!strstr($_GET['zoomFile'], '.')){
			$_GET['zoomFile'] = $axZmH->uncompress($_GET['zoomFile'], true);
		}

		$_GET['zoomDir'] = $axZmH->checkSlash(dirname($_GET['zoomFile']), 'add');
		$_GET['zoomFile'] = basename($_GET['zoomFile']);
		
		if (!$axZmH->isValidFilename($_GET['zoomFile'], true)){
			unset($_GET['zoomFile']);
		}
	}
	
	// Decode and uncompress data array
	$_GET['zoomData'] = $axZmH->uncompress($_GET['zoomData'], false);
	
	if (is_array($_GET['zoomData'])){
		$pic_list_array = array();
		$pic_list_data = array(); 
		$zoomTmp = array();
		
		// Try to correct relative paths
		if (isset($_GET['zoomLoadAjax']) || isset($_GET['loadZoomAjaxSet']) || isset($_GET['setHW'])){
			$zoomTmp['fromPath'] = str_replace(array('http://', isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '', isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : '', isset($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT'] : ''), '', $_SERVER['HTTP_REFERER']);		
		}else{
			$zoomTmp['fromPath'] = $_SERVER['REQUEST_URI'];
		}
		
		if (substr($zoomTmp['fromPath'], -1) == '/' || substr($zoomTmp['fromPath'], -1) == '\\'){
			$zoomTmp['fromPath'] .= 'index.html';
		}
		
		foreach ($_GET['zoomData'] as $k=>$v){

			if ( (isset($_GET['zoomLoadAjax']) || isset($_GET['loadZoomAjaxSet']) || isset($_GET['setHW'])) && !$_SERVER['HTTP_REFERER'] && substr($v['p'],0, 3) == '../'){
				echo "<DIV style='padding: 10px; font-size: 150%; background-color: #CC1100; color: #FFFFFF' class=''>
				<div style='font-size: 200%'>Error</div>
				When images or folders are defined as relative paths (../) it may lead to not showing them under certain conditions. 
				A simple workaround is to always use absolute paths. Please address this message to the website administrator. Thank you. 
				</DIV>
				<script>window.aZrelPathError = true;</script>
				";
				exit;
			}
			
			// Relative paths correction
			if ($zoomTmp['fromPath'] && substr($v['p'],0, 3) == '../'){
				$zoomTmp['zoomDirInfo'] = pathinfo($axZmH->checkSlash(dirname(dirname($zoomTmp['fromPath'])).substr($v['p'],2),'add'));
				if (!is_dir($axZmH->checkSlash($zoom['config']['fpPP'].$axZmH->checkSlash(dirname(dirname($zoomTmp['fromPath'])).substr($v['p'],2),'add'),'add'))){
					unset($zoomTmp['zoomDirInfo']);
				}
			}
			
			if ($zoomTmp['zoomDirInfo']){
				$v['p'] =  $axZmH->checkSlash('/'.$zoomTmp['zoomDirInfo']['dirname'].'/'.$zoomTmp['zoomDirInfo']['basename'], 'add');
			}
			
			// Check data array
			if (!$axZmH->isValidFilename($v['f'], true) || !$axZmH->isValidPath($v['p'])){
				unset($_GET['zoomData'][$k]);
			}else{
				// Fill $pic_list_array and $pic_list_data
				$pic_list_array[$k] = $v['f'];
				$pic_list_data[$k]['path'] = $v['p'];

				
				if (!$zoomTmp['zoomDirFound'] AND isset($_GET['zoomDir'])){
					if ($_GET['zoomDir'] == $v['p']){
						$zoomTmp['zoomDirFound'] = true;
					}
				}
			}
			
			$zoomTmp['zoomDirInfo'] = false;
		}
		
		
		// Unset zoomDir if not found above
		if (!$zoomTmp['zoomDirFound'] AND isset($_GET['zoomDir'])){
			unset ($_GET['zoomDir']);
		}
		
		// Choose the first folder if zoomDir ($_GET['zoomDir']) is not passed or has been unset above
		if (!isset($_GET['zoomDir']) AND is_array($_GET['zoomData'])){
			reset($_GET['zoomData']);
			$_GET['zoomDir'] = $_GET['zoomData'][key($_GET['zoomData'])]['p'];
		}	

		// Shops Hack
		if (in_array($_GET['example'], array('magento', 'oxid', 'xtc'))){
			// Remove gallery for shops if only one image is loaded
			if (count($pic_list_array) == 1){
				$zoom['config']['galleryNavi'] = false;
				$zoom['config']['useFullGallery'] = false;
				$zoom['config']['useGallery'] = false;
				$zoom['config']['useHorGallery'] = false;
			}
	
			if (count($pic_list_array) <= 3){
				$zoom['config']['galleryScrollbarWidth'] = 0; 
				$zoom['config']['galleryPlayButton'] = false; 
			} else{
				$zoom['config']['galleryScrollbarWidth'] = 10;
			}
		}
	}
	else {
		unset($_GET['zoomData']);
	}
}

elseif (isset($_GET['3dDir']) && strlen($_GET['3dDir'])){

	$pic_list_array = array();
	$pic_list_data = array(); 
	$zoomTmp = array();	

	if (substr($_GET['3dDir'],0, 2) == './' || substr(strtolower($_GET['3dDir']),0, 2) == 'c:'){
		$_GET['3dDir'] = substr($_GET['3dDir'], 2);
	}
 	
	$_GET['3dDir'] = str_replace(array('http://', isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '', isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : '', isset($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT'] : ''), '', $_GET['3dDir']);

	// $zoom['config']['pic'] from zoomConfig.inc.php as basePath
	$zoom['config']['pic'] = $axZmH->checkSlash($zoom['config']['pic'].'/'.$_GET['3dDir'],'add');
	$zoom['config']['picDir'] = $axZmH->checkSlash($zoom['config']['fpPP'].$zoom['config']['pic'], 'add');
	
	// Try absolute path
	if (!is_dir($zoom['config']['picDir'])){
		$zoom['config']['pic'] = $axZmH->checkSlash('/'.$_GET['3dDir'],'add');
		$zoom['config']['picDir'] = $axZmH->checkSlash($zoom['config']['fpPP'].$zoom['config']['pic'], 'add');
	}

	if (!is_dir($zoom['config']['picDir'])){
		
		// Try to correct relative paths
		if (isset($_GET['zoomLoadAjax']) || isset($_GET['loadZoomAjaxSet']) || isset($_GET['setHW'])){
			$zoomTmp['fromPath'] = str_replace(array('http://', isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '', isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : '', isset($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT'] : ''), '', $_SERVER['HTTP_REFERER']);
			if (!$_SERVER['HTTP_REFERER'] && stristr($_GET['3dDir'], '../')){
				echo "<DIV style='padding: 10px; font-size: 150%; background-color: #CC1100; color: #FFFFFF' class=''>
				<div style='font-size: 200%'>Error</div>
				When images or folders are defined as relative paths (../) it may lead to not showing them under certain conditions. 
				A simple workaround is to always use absolute paths. Please address this message to the website administrator. Thank you. 
				</DIV>
				<script>window.aZrelPathError = true;</script>
				";
				exit;
			}
		
		}else{
			$zoomTmp['fromPath'] = $_SERVER['REQUEST_URI'];
		}
		
		if (substr($zoomTmp['fromPath'], -1) == '/' || substr($zoomTmp['fromPath'], -1) == '\\'){
			$zoomTmp['fromPath'] .= 'index.html';
		}
		
		// Relative paths correction
		if ($zoomTmp['fromPath'] && substr($_GET['3dDir'],0, 3) == '../'){
			
			$zoomTmp['zoomDirInfo'] = pathinfo($axZmH->checkSlash(dirname(dirname($zoomTmp['fromPath'])).substr($_GET['3dDir'],2),'add'));
			if (!is_dir($axZmH->checkSlash($zoom['config']['fpPP'].$axZmH->checkSlash(dirname(dirname($zoomTmp['fromPath'])).substr($_GET['3dDir'],2),'add'),'add'))){
				unset($zoomTmp['zoomDirInfo']);
			}
		} 

		// Not absolute path
		elseif ($zoomTmp['fromPath'] && substr($_GET['3dDir'],0, 1) != '/'){
			$zoomTmp['zoomDirInfo'] = pathinfo($axZmH->checkSlash(dirname(dirname($zoomTmp['fromPath'])).'/'.$_GET['3dDir'],'add'));
			if (!is_dir($axZmH->checkSlash($zoom['config']['fpPP'].$axZmH->checkSlash(dirname(dirname($zoomTmp['fromPath'])).'/'.$_GET['3dDir'],'add'),'add'))){
				unset($zoomTmp['zoomDirInfo']);
			}
		}
		
		// Try to find the path by adding $zoom['config']['installPath']
		elseif ($zoom['config']['installPath'] && substr($_GET['3dDir'],0, 1) == '/'){
			$zoom['config']['pic'] = $axZmH->checkSlash($zoom['config']['installPath'].'/'.$_GET['3dDir'],'add');
			$zoom['config']['picDir'] = $axZmH->checkSlash($zoom['config']['fpPP'].$zoom['config']['pic'],'add');
		}

		if ($zoomTmp['zoomDirInfo']){
			$_GET['3dDir'] =  $axZmH->checkSlash('/'.$zoomTmp['zoomDirInfo']['dirname'].'/'.$zoomTmp['zoomDirInfo']['basename'], 'add'); // remove
			$zoom['config']['pic'] = $_GET['3dDir'];
			$zoom['config']['picDir'] = $axZmH->checkSlash($zoom['config']['fpPP'].$_GET['3dDir'],'add');
		}
	}
	
	if (!$axZmH->isValidPath($_GET['3dDir']) ){
		unset ($_GET['3dDir'], $zoom['config']['picDir'], $zoom['config']['pic']);
	}

	// picDir should not contain/be some ajax-zoom cache directory
	if ($zoom['config']['picDir'] == $zoom['config']['thumbDir'] 
	|| $zoom['config']['picDir'] == $zoom['config']['galleryDir'] 
	|| strstr($zoom['config']['picDir'], $zoom['config']['pyrTilesDir']) 
	|| strstr($zoom['config']['picDir'], $zoom['config']['gPyramidDir']) 
	|| $zoom['config']['picDir'] == $zoom['config']['mapDir'] 
	|| $zoom['config']['picDir'] == $zoom['config']['tempCacheDir'] 
	){
		unset ($_GET['3dDir'], $zoom['config']['picDir'], $zoom['config']['pic']);
	}
	
	if ($_GET['zoomCueFrames']){
		$zoom['config']['cueFrames'] = $axZmH -> testCSV($_GET['zoomCueFrames'], ',', 'int');
	}
	
	// Open all files
	if (is_dir($zoom['config']['picDir'])){
		$n=0; $z=0;
		foreach (glob($zoom['config']['picDir'].'*') as $file){
			$thisFile = $axZmH->getl('/', $axZmH->checkSlash($file,'remove'));
			
			// Subfolders for multirow 360 Object
			if (is_dir($file)){
				if (!is_array($zoom['config']['zAxis'])){
					$zoom['config']['zAxis'] = array();
					$zoom['config']['zFolder'] = array();
					$thisNumberFiles = array();
				}
				
				// Limit to 9 levels
				$z++; if ($z > 9){break;}
				
				$zoom['config']['zFolder'][$z] = $thisFile;
				
				$zoomTmp['subFiles'] = array();
				
				// Read the files first, glob does not always sort as expected
				$tt = 0;
				foreach (glob($axZmH->checkSlash($file,'add').'*') as $subFile){
					$thisSubFile = $axZmH->getl('/', $axZmH->checkSlash($subFile,'remove'));
					if ($axZmH->isValidFileType($thisSubFile)){
						$zoomTmp['subFiles'][] = $thisSubFile;
						$tt++;
					}
					// Limit to 360 images
					if ($tt > 360){
						echo "<DIV style='padding: 10px; font-size: 150%; background-color: #CC1100; color: #FFFFFF' class=''>
						<div style='font-size: 200%'>Error</div>
						The number of images in one row of your spherical 3D exceeded the limit to 360 images. 
						AJAX-ZOOM broke up with the request.
						</DIV>
						<script>window.aZ3dError = true;</script>
						";
						exit;						
					}
				}
				$thisNumberFiles[$z] = $tt;
				 
				if ($z > 1 && $thisNumberFiles[$z-1] != $tt){
					echo "<DIV style='padding: 10px; font-size: 150%; background-color: #CC1100; color: #FFFFFF' class=''>
					<div style='font-size: 200%'>Error</div>
					The number of images in subfolders (".$_GET['3dDir'].") for your spherical 3D is not equal. 
					While in one folder there are ".$thisNumberFiles[$z-1]." images, an other contains ".$tt." images. 
					As of current version this is not possible. AJAX-ZOOM broke up with the request. 
					If you are not sure why is that, please contact the support.
					</DIV>
					<script>window.aZ3dError = true;</script>
					";
					exit;
				}
				
				$zoomTmp['subFiles'] = $axZmH->natIndex($zoomTmp['subFiles'], false);
				
				if (!empty($zoomTmp['subFiles'])){
					foreach ($zoomTmp['subFiles'] as $k => $thisSubFile){
						$n++; 
						$pic_list_array[$n] = $thisSubFile;
						$pic_list_data[$n]['path'] = $zoom['config']['pic'].$thisFile;
						$zoom['config']['zAxis'][$z][$n] = $thisSubFile;
					}
				}

			} elseif (!isset($zoom['config']['zAxis'])){
				if ($axZmH->isValidFileType($thisFile)){
					$n++; $pic_list_array[$n] = $thisFile;
				}
			}
		}
		
		if (isset($zoom['config']['zAxis'])){
		
		}
		
		if (!isset($zoom['config']['zAxis']) && !empty($pic_list_array)){
			$pic_list_array = $axZmH->natIndex($pic_list_array, false);
		}

	}
} 

// $_GET['zoomDir']
elseif (isset($_GET['zoomDir']) && strlen($_GET['zoomDir'])){

	// The key (zoomID) should be an integer > 0 
	$pic_list_array = array();
	
	// $pic_list_data is a "multidimensional" array which contains more information about the source files
	$pic_list_data = array(); 
	
	// Temp array
	$zoomTmp = array();
	
	// Create empty array for folders
	$zoomTmp['folderArray'] = array();

	// Open the "base directory" $zoom['config']['picDir'] and choose only folders in it (GLOB_ONLYDIR)
	// needed for some examples...
	if (isset($axZmScanDir)){
		$n=0; // Start counter
		foreach (glob($axZmH->checkSlash($zoom['config']['picDir'],'add').'*', GLOB_ONLYDIR) as $folder){
			$n++; 
			// Fill folder array with subfolder names
			$zoomTmp['folderArray'][$n] = $axZmH->getl('/',$folder);
		}
		$zoom['config']['folderArray'] = $zoomTmp['folderArray'];
	}

	if (substr($_GET['zoomDir'],0, 2) == './' || substr(strtolower($_GET['zoomDir']),0, 2) == 'c:'){
		$_GET['zoomDir'] = substr($_GET['zoomDir'], 2);
	}
 	
	$_GET['zoomDir'] = str_replace(array('http://', isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '', isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : '', isset($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT'] : ''), '', $_GET['zoomDir']);

	// $zoom['config']['pic'] from zoomConfig.inc.php as basePath
	$zoom['config']['pic'] = $axZmH->checkSlash($zoom['config']['pic'].'/'.$_GET['zoomDir'],'add');
	$zoom['config']['picDir'] = $axZmH->checkSlash($zoom['config']['fpPP'].$zoom['config']['pic'], 'add');
	
	// Try absolute path
	if (!is_dir($zoom['config']['picDir'])){
		$zoom['config']['pic'] = $axZmH->checkSlash('/'.$_GET['zoomDir'],'add');
		$zoom['config']['picDir'] = $axZmH->checkSlash($zoom['config']['fpPP'].$zoom['config']['pic'], 'add');
	}

	if (!is_dir($zoom['config']['picDir'])){
		
		// Try to correct relative paths
		if (isset($_GET['zoomLoadAjax']) || isset($_GET['loadZoomAjaxSet']) || isset($_GET['setHW'])){
			$zoomTmp['fromPath'] = str_replace(array('http://', isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '', isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : '', isset($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT'] : ''), '', $_SERVER['HTTP_REFERER']);
			if (!$_SERVER['HTTP_REFERER'] && stristr($_GET['zoomDir'], '../')){
				echo "<DIV style='padding: 10px; font-size: 150%; background-color: #CC1100; color: #FFFFFF' class=''>
				<div style='font-size: 200%'>Error</div>
				When images or folders are defined as relative paths (../) it may lead to not showing them under certain conditions. 
				A simple workaround is to always use absolute paths. Please address this message to the website administrator. Thank you. 
				</DIV>
				<script>window.aZrelPathError = true;</script>
				";
				exit;
			}
		
		}else{
			$zoomTmp['fromPath'] = $_SERVER['REQUEST_URI'];
		}
		
		if (substr($zoomTmp['fromPath'], -1) == '/' || substr($zoomTmp['fromPath'], -1) == '\\'){
			$zoomTmp['fromPath'] .= 'index.html';
		}
		
		// Relative paths correction
		if ($zoomTmp['fromPath'] && substr($_GET['zoomDir'],0, 3) == '../'){
			
			$zoomTmp['zoomDirInfo'] = pathinfo($axZmH->checkSlash(dirname(dirname($zoomTmp['fromPath'])).substr($_GET['zoomDir'],2),'add'));
			if (!is_dir($axZmH->checkSlash($zoom['config']['fpPP'].$axZmH->checkSlash(dirname(dirname($zoomTmp['fromPath'])).substr($_GET['zoomDir'],2),'add'),'add'))){
				unset($zoomTmp['zoomDirInfo']);
			}
		} 

		// Not absolute path
		elseif ($zoomTmp['fromPath'] && substr($_GET['zoomDir'],0, 1) != '/'){
			$zoomTmp['zoomDirInfo'] = pathinfo($axZmH->checkSlash(dirname(dirname($zoomTmp['fromPath'])).'/'.$_GET['zoomDir'],'add'));
			if (!is_dir($axZmH->checkSlash($zoom['config']['fpPP'].$axZmH->checkSlash(dirname(dirname($zoomTmp['fromPath'])).'/'.$_GET['zoomDir'],'add'),'add'))){
				unset($zoomTmp['zoomDirInfo']);
			}
		}
		
		// Try to find the path by adding $zoom['config']['installPath']
		elseif ($zoom['config']['installPath'] && substr($_GET['zoomDir'],0, 1) == '/'){
			$zoom['config']['pic'] = $axZmH->checkSlash($zoom['config']['installPath'].'/'.$_GET['zoomDir'],'add');
			$zoom['config']['picDir'] = $axZmH->checkSlash($zoom['config']['fpPP'].$zoom['config']['pic'],'add');
		}

		if ($zoomTmp['zoomDirInfo']){
			$_GET['zoomDir'] =  $axZmH->checkSlash('/'.$zoomTmp['zoomDirInfo']['dirname'].'/'.$zoomTmp['zoomDirInfo']['basename'], 'add'); // remove
			$zoom['config']['pic'] = $_GET['zoomDir'];
			$zoom['config']['picDir'] = $axZmH->checkSlash($zoom['config']['fpPP'].$_GET['zoomDir'],'add');
		}
	}
	
	if (!$axZmH->isValidPath($_GET['zoomDir']) ){
		unset ($_GET['zoomDir'], $zoom['config']['picDir'], $zoom['config']['pic']);
	}

	// picDir should not contain/be some ajax-zoom cache directory
	if ($zoom['config']['picDir'] == $zoom['config']['thumbDir'] 
	|| $zoom['config']['picDir'] == $zoom['config']['galleryDir'] 
	|| strstr($zoom['config']['picDir'], $zoom['config']['pyrTilesDir']) 
	|| strstr($zoom['config']['picDir'], $zoom['config']['gPyramidDir']) 
	|| $zoom['config']['picDir'] == $zoom['config']['tempCacheDir'] 
	|| $zoom['config']['picDir'] == $zoom['config']['mapDir'] 
	){
		unset ($_GET['zoomDir'], $zoom['config']['picDir'], $zoom['config']['pic']);
	}	

	if ($zoom['config']['picDir']){
		$n=0; $pic_list_info = array(); $pic_list_all_info = array();

		foreach (glob($zoom['config']['picDir'].'*') as $file){
			$thisFile = $axZmH->getl('/', $axZmH->checkSlash($file, 'remove'));
			if ( $axZmH->isValidFileType($thisFile) ){
				// Add filename to the pic_list_array with the index $n ($n >= 1)
				$n++; 
				$pic_list_array[$n] = $thisFile;
				
				if ($zoom['config']['sortBy']){
					 $thisFileStat = stat($file);
					 if ($thisFileStat[$zoom['config']['sortBy']]){
						 $pic_list_info[$n] =  $thisFileStat[$zoom['config']['sortBy']];
					 }
					 $pic_list_all_info[$n] = $thisFileStat;
				}
			}			
		}
		
		// Sort images by value set in $zoom['config']['sortBy'] (any key returned by php stat() function)
		if ($zoom['config']['sortBy'] && !empty($pic_list_info)){
			if ($zoom['config']['sortReverse']){arsort($pic_list_info);}
			else{asort($pic_list_info);}
			$n=0; $pic_list_array_tmp = $pic_list_array;
			foreach ($pic_list_info as $k=>$v){
				$n++; 
				if (!$pic_list_data[$n]){$pic_list_data[$n] = array();}
				$pic_list_array[$n] = $pic_list_array_tmp[$k]; // set filename
				$pic_list_data[$n][$zoom['config']['sortBy']] = $v;
				$pic_list_data[$n]['stat'] = $pic_list_all_info[$k];
			}
			
		}else{
			// Sort piclist by filename if you want, (not necessary)
			$pic_list_array = $axZmH->natIndex($pic_list_array, $zoom['config']['sortReverse'] ? true : false);		
		}
	}
}


////////////////////////////////////////
//// STEP 2 - COLLECT INFORMATION //////
////////////////////////////////////////

// Loop through the $pic_list_array
// $k is the "zoomID" and $v is the source filename
if (!empty($pic_list_array)){
	foreach ($pic_list_array as $k=>$v){
		
		// Store filename under the key 'fileName'
		$pic_list_data[$k]['fileName'] = $v; 
		
		// Heuristic approach
		if (isset($pic_list_data[$k]['path'])){
			$picPath = $axZmH->checkSlash($zoom['config']['pic'].'/'.$pic_list_data[$k]['path'],'add');
			$zoom['config']['picDir'] = $axZmH->checkSlash($zoom['config']['fpPP'].$picPath,'add');
			$thisPicPath =  $axZmH->checkSlash($pic_list_data[$k]['path'],'add');
			
			if (!is_dir($zoom['config']['picDir'])){
				$picPath = $axZmH->checkSlash('/'.$pic_list_data[$k]['path'],'add');
				$zoom['config']['picDir'] = $axZmH->checkSlash($zoom['config']['fpPP'].$picPath,'add');
				
				if (!is_dir($zoom['config']['picDir'])){
					$picPath = $axZmH->checkSlash($zoom['config']['installPath'].'/'.$pic_list_data[$k]['path'],'add');
					$zoom['config']['picDir'] = $axZmH->checkSlash($zoom['config']['fpPP'].$picPath,'add');
				}
			}
			$pic_list_data[$k]['picPath'] = $picPath;
		}
		
		// Save full path of the image
		$pic_list_data[$k]['thisImagePath'] = $axZmH->checkSlash($zoom['config']['picDir'].'/'.$v, 'remove');
	
		// We need this information only once at loading process, not for zooming into an image. 
		// AJAX-ZOOM passes the  additional parameter 'str' which means that this is a zoom request. 
		if (!isset($_GET['str'])){
			// Store imagesize under the key 'imgSize' (necessary!!!)
			$pic_list_data[$k]['imgSize'] = $axZm->imageSize($zoom['config']['picDir'].$pic_list_array[$k], $zoom['config']['im'], false);
	
			// Store filesize under the key 'fileSize' (not necessary, just for example)
			$pic_list_data[$k]['fileSize'] = filesize($zoom['config']['picDir'].$pic_list_array[$k]);
			
			// Under the key 'thumbDescr' you can store any short image information that will be shown under the thumb of image gallery
			// This is just an example, if image size is important
			if (!in_array($_GET['example'], array('magento', 'oxid', 'xtc'))){
				
				// Thumb description
				if (function_exists($zoom['config']['galleryThumbDesc'])){
					$pic_list_data[$k]['thumbDescr'] = $zoom['config']['galleryThumbDesc']($pic_list_data, $k);
				}
				
				// Full description
				if (function_exists($zoom['config']['galleryThumbFullDesc'])){
					$pic_list_data[$k]['fullDescr'] = $zoom['config']['galleryThumbFullDesc']($pic_list_data, $k);
				}
			}
		}
	}
	
	// Store information in $zoom['config']
	$zoom['config']['pic_list_array'] = $pic_list_array;
	$zoom['config']['pic_list_data'] = $pic_list_data;
	
	// Check the existance of the files and generate everything needed on the fly
	$proceed = $axZmH->proceedList($zoom, $zoomTmp);
	$zoom = $proceed[0]; $zoomTmp = $proceed[1];
	$pic_list_array = $zoom['config']['pic_list_array'];
	$pic_list_data = $zoom['config']['pic_list_data'];
}
?>