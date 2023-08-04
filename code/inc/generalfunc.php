<?php
function getstatelist(){
	$qry = "Select * from location_master where city IS NULL";
	$res = ets_db_query($qry) or die(ets_db_error());
	$grp_arr = array();
	
	while($arr = ets_db_fetch_array($res))
	{
		$grp_arr[$arr['state']] = $arr['state'];
	}
	
	return $grp_arr;
}
function getexperiencelist(){
	$qry = "Select * from experience_master where status = 'E'";
	$res = ets_db_query($qry) or die(ets_db_error());
	$grp_arr = array();
	
	while($arr = ets_db_fetch_array($res))
	{
		$grp_arr[$arr['experience_id']] = $arr['title'];
	}
	
	return $grp_arr;
}
function getfldValue($tblName,$keyfld,$keyfldvalue,$getfld){
		$arrSql = ets_db_query("select $getfld from $tblName where $keyfld = '".$keyfldvalue."' ") or die(ets_db_error());
   		if(ets_db_num_rows($arrSql) > 0){
			$rs = ets_db_fetch_array($arrSql);
			return $rs[$getfld];
		}else{
			return "No Value Defined..";					
		}
	} 
function getservicelist($type){
	$qry = "Select * from service_master where status = 'E'";
	$res = ets_db_query($qry) or die(ets_db_error());
	$grp_arr = array();
	
	while($arr = ets_db_fetch_array($res))
	{
		$use_for = explode(',',$arr['use_for']);
		if(count($use_for) > 1)
		{
			$grp_arr[$arr['service_id']] = $arr['title'];
		}
		
	
		else
		{
			if($type == $use_for[0])
			$grp_arr[$arr['service_id']] = $arr['title'];	
		}
	}
	
	return $grp_arr;
}
function get_website_details()
{
	$qry = "Select * from website_master where id = 1";
	$res = ets_db_query($qry);
	$earr = ets_db_fetch_array($res);
	$web_arr = array();
	
	$powered_by = unserialize($earr['powered_by']);
	$social = unserialize($earr['social']);
	
	$web_arr['powered_by'] = $powered_by;
	$web_arr['social'] = $social;
	$web_arr['logo'] = DIR_WS_LOGO_PATH.$earr['logo'];
	$web_arr['footer_logo'] = DIR_WS_LOGO_PATH.$earr['footer_logo'];
	$web_arr['copyright'] = $earr['copyright'];
	$web_arr['about_us'] = $earr['about_us'];
	
	$web_arr['email1'] = $earr['email1'];
	$web_arr['email2'] = $earr['email2'];
	$web_arr['tel1'] = $earr['tel1'];
	$web_arr['tel2'] = $earr['tel2'];
	$web_arr['fax'] = $earr['fax'];
	$web_arr['address'] = stripslashes($earr['address']);
	
	return $web_arr;
}
function sort_images($images)
{
	$cnt = count($images);
	$a = array();
	$b = array();
	$c = array();
	$sort_array = array();
	
	$i = 0;
	$j = 0;
	$k = 0;
	$ct = 0;
	
	foreach($images as $img)
	{
		$type = $img['type'];
		$title = $img['title'];
		
		if($type == 'A')
		{
			$a[$i]['image'] = $img['image'];
			$a[$i]['title'] = $img['title'];
			$i++;
		}
		
		else if($type == 'B')
		{
			$b[$j]['image'] = $img['image'];
			$b[$j]['title'] = $img['title'];
			$j++;
		}
		
		else if($type == 'C')
		{
			$c[$k]['image'] = $img['image'];
			$c[$k]['title'] = $img['title'];
			$k++;
		}
	}
	
	$i = 0;
	$j = 0;
	$k = 0;
	$flag = 0;
	
	for($ct = 0;$ct < $cnt;$ct++)
	{
		if($flag == 3)
		{
			$sort_array[$ct]['image'] = $b[$j]['image'];
			$sort_array[$ct]['title'] = $b[$j]['title'];
			$j++;
		}
		
		else if($flag == 4)
		{
			$sort_array[$ct]['image'] = $c[$k]['image'];
			$sort_array[$ct]['title'] = $c[$k]['title'];
			$k++;
		}
		
		else
		{
			$sort_array[$ct]['image'] = $a[$i]['image'];
			$sort_array[$ct]['title'] = $a[$i]['title'];
			$i++;
		}
		
		$flag++;
		if($flag > 7)
			$flag = 0;
		
		
	}
	
	return $sort_array;
}

function dateFormat($input_date, $input_format, $output_format) {
   preg_match("/^([\w]*)/i", $input_date, $regs);
   $sep = substr($input_date, strlen($regs[0]), 1);
   $label = explode($sep, $input_format);
   $value = explode($sep, $input_date);
   $array_date = array_combine($label, $value);
   if (in_array('Y', $label)) {
       $year = $array_date['Y'];
   } elseif (in_array('y', $label)) {
       $year = $year = $array_date['y'];
   } else {
       return false;
   }
   
   $output_date = date($output_format, mktime(0,0,0,$array_date['m'], $array_date['d'], $year));
   return $output_date;
}
if (!function_exists('array_combine')) {
   function array_combine($a1, $a2) {
       if(count($a1) != count($a2))
           return false;
           if(count($a1) <= 0)
           return false;
       $a1 = array_values($a1);
       $a2 = array_values($a2);
       $output = array();
       for($i = 0; $i < count($a1); $i++) {
           $output[$a1[$i]] = $a2[$i];
       }
       return $output;
   }
}

function datediff($interval, $datefrom, $dateto, $using_timestamps = false) {
  /*
    $interval can be:
    yyyy - Number of full years
    q - Number of full quarters
    m - Number of full months
    y - Difference between day numbers
      (eg 1st Jan 2004 is "1", the first day. 2nd Feb 2003 is "33". The datediff is "-32".)
    d - Number of full days
    w - Number of full weekdays
    ww - Number of full weeks
    h - Number of full hours
    n - Number of full minutes
    s - Number of full seconds (default)
  */
  
  if (!$using_timestamps) {
    $datefrom = strtotime($datefrom, 0);
    $dateto = strtotime($dateto, 0);
  }
  $difference = $dateto - $datefrom; // Difference in seconds
   
  switch($interval) {
   
    case 'yyyy': // Number of full years

      $years_difference = floor($difference / 31536000);
      if (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom), date("j", $datefrom), date("Y", $datefrom)+$years_difference) > $dateto) {
        $years_difference--;
      }
      if (mktime(date("H", $dateto), date("i", $dateto), date("s", $dateto), date("n", $dateto), date("j", $dateto), date("Y", $dateto)-($years_difference+1)) > $datefrom) {
        $years_difference++;
      }
      $datediff = $years_difference;
      break;

    case "q": // Number of full quarters

      $quarters_difference = floor($difference / 8035200);
      while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($quarters_difference*3), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
        $months_difference++;
      }
      $quarters_difference--;
      $datediff = $quarters_difference;
      break;

    case "m": // Number of full months

      $months_difference = floor($difference / 2678400);
      while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($months_difference), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
        $months_difference++;
      }
      $months_difference--;
      $datediff = $months_difference;
      break;

    case 'y': // Difference between day numbers

      $datediff = date("z", $dateto) - date("z", $datefrom);
      break;

    case "d": // Number of full days

      $datediff = floor($difference / 86400);
      break;

    case "w": // Number of full weekdays

      $days_difference = floor($difference / 86400);
      $weeks_difference = floor($days_difference / 7); // Complete weeks
      $first_day = date("w", $datefrom);
      $days_remainder = floor($days_difference % 7);
      $odd_days = $first_day + $days_remainder; // Do we have a Saturday or Sunday in the remainder?
      if ($odd_days > 7) { // Sunday
        $days_remainder--;
      }
      if ($odd_days > 6) { // Saturday
        $days_remainder--;
      }
      $datediff = ($weeks_difference * 5) + $days_remainder;
      break;

    case "ww": // Number of full weeks

      $datediff = floor($difference / 604800);
      break;

    case "h": // Number of full hours

      $datediff = floor($difference / 3600);
      break;

    case "n": // Number of full minutes

      $datediff = floor($difference / 60);
      break;

    default: // Number of full seconds (default)

      $datediff = $difference;
      break;
  }    

  return $datediff;

}
function tep_date_dmy($txtvalue) {
$dty=substr($txtvalue,0,4);
$dtd=substr($txtvalue,8,2);
$dtm=substr($txtvalue,5,2);
$dt=$dtd.".".$dtm.".".$dty;
return $dt;
}
function tep_date($txtvalue) {
$dty=substr($txtvalue,6);
$dtd=substr($txtvalue,3,2);
$dtm=substr($txtvalue,0,2);
$dt=$dty."-".$dtm."-".$dtd;
return $dt;
}
function clean($data) {
	$data = escapeshellcmd($data);
	$data = preg_replace("/\.\./", "", $data);
	$data = preg_replace("/^\//", "", $data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	$data = trim($data);
	return $data;
}

function tep_word_trim($string, $count, $ellipsis = FALSE){
  $words = explode(' ', strip_tags($string));
  if (count($words) > $count){
    array_splice($words, $count);
    $string = implode(' ', $words);
    if (is_string($ellipsis)){
      $string .= $ellipsis;
    }
    elseif ($ellipsis){
      $string .= '&hellip;';
    }
  }
  return $string;
}
function the_page($page){
	$pgqry = "select * from page_master where page_id = '".$page."'";
	$pgqry_exec = ets_db_query($pgqry) or die(ets_db_error());
	if(ets_db_num_rows($pgqry_exec) > 0){
		$pgarr = ets_db_fetch_array($pgqry_exec);
		return $pgarr['page_content'];
	}
	else{
		return "!!! Requesting Page Not Found...";
	}
	
	
}
	function pro_SeoSlug($strToSlug){
		$seoSlug = strtolower($strToSlug);
		$seoSlug= trim($seoSlug);
		$seoSlug = preg_replace("`[.*]`U","",$seoSlug);
		$seoSlug = preg_replace('`&(amp;)?#?[a-z0-9]+;`i','-',$seoSlug);
		$seoSlug = htmlentities($seoSlug, ENT_COMPAT, 'utf-8');
		$seoSlug = preg_replace( "`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i","\1", $seoSlug);
		$seoSlug = preg_replace( array("`[^a-z0-9]`i","`[-]+`") , "-", $seoSlug);
		$seoSlug = str_replace( "---" , "-", $seoSlug);
		return $seoSlug;
	}
	function getSeoModule($seoslug,$module_id){
		
		$seomodule = ets_db_query("Select * from seo_link_master where seo_slug = '".$seoslug."' and module_id = '".$module_id."' ") or die(ets_db_error());
		$sesmoduleres = ets_db_fetch_array($seomodule);
		return $sesmoduleres['module_name'];
	}
function has_sub_pages($pageid){
	$qrypage = ets_db_query("select page_id from page_master where parent_id = '".$pageid."'") or die(ets_db_error());
	if(ets_db_num_rows($qrypage)>0){
		return 1;
	}
	else{
		return 0;
	}
}

function tep_get_username($userid){
	$userqry = ets_db_query("Select * from usermst where userID='".$userid."'");
	while($userres = ets_db_fetch_array($userqry)){
		$username = $userres['name'];
	}
	return $username;
}
function chkuser($emailid){
	$userqry = ets_db_query("Select * from usermst where email='".$emailid."'");
	if(ets_db_num_rows($userqry) > 0){
		return false;
	}
	else{
		return true;
	}
}

function subMenu($pgparent){
	$dept_display = '';
	$deptmain_sql = ets_db_query("select * from page_master where parent_id = '".$pgparent."' order by sortorder") or die(ets_db_error());	
	if(ets_db_num_rows($deptmain_sql) > 0 ){
		while($deptmain_res = ets_db_fetch_array($deptmain_sql)) {
			if($module_id == $deptmain_res['page_id']){
				$page_class='class="active"';
			}
			else{
				$page_class='';
			}
		
			$dept_display .= '<li><a href="'.get_pageseo_url($deptmain_res['page_id'],'pages').'" title="'.$deptmain_res['page_title'].'" '.$page_class.'>'.$deptmain_res['page_title'].'</a>';
			$deptsub_sql = ets_db_query("select * from page_master where parent_id = '".$deptmain_res['page_id']."' order by sortorder");
			if(ets_db_num_rows($deptsub_sql) > 0 ){
				$dept_display .= '<ul class="dropdown-menu">';
				while($deptsub_res = ets_db_fetch_array($deptsub_sql)) {				
					$dept_display .= '<li><a href="'.get_pageseo_url($deptsub_res['page_id'],'pages').'" title="'.$deptsub_res['page_title'].'">'.$deptsub_res['page_title'].'</a></li>';
				}
				$dept_display .= '</ul>';
			}
			
			$dept_display .= '</li>';
		}
		
	}
	return $dept_display;
}

function projectMenu(){
	$menuList = "";
	$proSql = ets_db_query("Select * from productType where status = 'E' order by sortorder") or die(ets_db_error());
	while($lrs = ets_db_fetch_array($proSql)){
		if($module_id == $lrs['pTypeID']){
			$page_class='class="active"';
		}
		else{
			$page_class='';
		}
		$menuList .= '<li><a href="'.get_pageseo_url($lrs['pTypeID'],'projects').'" title="'.$lrs['pTypeTitle'].'" '.$page_class.'>'.$lrs['pTypeTitle'].'</a></li>';
	}
	return $menuList;

}
function projectfMenu($module_id){
	$menuList = "";
	$proSql = ets_db_query("Select * from productType where status = 'E' order by sortorder") or die(ets_db_error());
	while($lrs = ets_db_fetch_array($proSql)){
		if($module_id == $lrs['pTypeID']){
			$page_class='data-class="active"';
		}
		else{
			$page_class='';
		}
		$menuList .= '<li class="prjfltr" data-filter="'.get_pageseo_url($lrs['pTypeID'],'projects').'" '.$page_class.'>'.$lrs['pTypeTitle'].'</li>';
	}
	return $menuList;

}

function breadcrumblist($currentpageid){
	
	$checkparent = getparentid($currentpageid);
	$pagelist[$checkparent['page_id']]=$checkparent['page_title'];
	
	if($checkparent['parent_id'] > 0){
		$check2nd =  getparentid($checkparent['parent_id']);
		$pagelist[$check2nd['page_id']] = $check2nd['page_title'];
		if($check2nd['parent_id'] > 0){
			$check3rd =  getparentid($check2nd['parent_id']);
			$pagelist[$check3rd['page_id']] = $check3rd['page_title'];
			if($check3rd['parent_id'] > 0){
				$check4th =  getparentid($check3rd['parent_id']);
				$pagelist[$check4th['page_id']] = $check4th['page_title'];
			}
		}
	}
	$pagelist = array_reverse($pagelist);
	return $pagelist;
}
function getparentid($togetid){
	$parentqry = ets_db_query("select * from page_master where page_id = '".$togetid."'") or die(ets_db_error());
	if(ets_db_num_rows($parentqry) > 0){
		$parentrs = ets_db_fetch_array($parentqry);
		return $parentrs;
	}
}


/* Get News Type Name */
function getNewsType($NewsID){
	$customer_qry = ets_db_query("select * from news_type where news_type_id = '".$NewsID."' ") or die(ets_db_error());
	$rs = ets_db_fetch_array($customer_qry);
	return $rs['news_type'];
}
/* List News Widget */
function widgetNews($listno,$type){
	$sqlnews = "select * from news where status = 'E' order by sortorder desc limit 0,".$listno; 
	$sql = ets_db_query($sqlnews) or die('Query failed : ' . ets_db_error());
	$newsList = "";
	while($rs = ets_db_fetch_array($sql)){
		$news_type = "News/".strtolower(str_replace(" ","-",getNewsType($rs['news_type'])));
		$newsList .= '
		<li class="testimonial">
			<a href="'.get_pageseo_url($rs['news_id'],$news_type).'"><strong>'.$rs['news_title'].'</strong></a><br>
			<i class="icon-calendar"></i> <i>'.$rs['eve_date'].'</i><br>
			
		</li>';
	}
	return $newsList;
}
/* Get Album Name */
function getAlbumName($albumID){
	$albumQry = ets_db_query("select * from album where a_id = '".$albumID."' ") or die(ets_db_error());
	$rs = ets_db_fetch_array($albumQry);
	return $rs['a_title'];
}
/* Get Branch List */
function getBranchList(){
	$branchQry = ets_db_query("select * from branch_master order by sortorder ") or die(ets_db_error());
	$branchlist = "";
	while($rs = ets_db_fetch_array($branchQry)){
		$branchlist .= '<option value="'.$rs['branch_name'].'">'.$rs['branch_name'].'</option><br>';
	}
	return $branchlist;
}
/* Get Designation Name */
function getDesgName($desgID){
	$desgQry = ets_db_query("select * from designation_master where design_id = '".$desgID."' ") or die(ets_db_error());
	$rs = ets_db_fetch_array($desgQry);
	return $rs['design_title'];
}
/* Get Module ID */
function getModuleID($moduleName){
	$modQry = ets_db_query("select * from seo_link_master where seo_slug = '".$moduleName."' ") or die(ets_db_error());
	$rs = ets_db_fetch_array($modQry);
	return $rs['module_id'];	
}
/* Get Post */
function get_post(){
$post_string = '';
$post_string .= '<option value="Clerk">Clerk</option>   
                            <option value="Officer">Officer</option>   
                            <option value="Executive">Executive</option>
                            <option value="Manager">Manager</option> 
<option value="Senior Manager">Senior Manager</option>';
return $post_string;
}

/* Get Product Type Name */
function getproducttype($pTypeID){
	$pType_qry = ets_db_query("select * from productType where pTypeID = '".$pTypeID."' ") or die(ets_db_error());
	$rs = ets_db_fetch_array($pType_qry);
	return $rs['pTypeTitle'];
}
	
	function getalbumtypeName($type_id){
		$albumname = ets_db_query("select * from album_type where type_id='".$type_id."' ") or die(ets_db_error());
		$rs = ets_db_fetch_array($albumname);
		return $rs['album_title'];
	}
function getservicesname($servicesID){
		$packname = "select * from services where servicesID='".$servicesID."' ";
		$packQry = ets_db_query($packname) or die(ets_db_error());
		$pa = ets_db_fetch_array($packQry);
		return $pa['servicesTitle'];
   }  
   function geteventname($programs_id){
		$packname = "select * from event where programs_id='".$programs_id."' ";
		$packQry = ets_db_query($packname) or die(ets_db_error());
		$pa = ets_db_fetch_array($packQry);
		return $pa['programs_title'];
   }  
   
   	function the_services($servicesID){
		$pgqry = "select * from services where servicesID='".$servicesID."' ";
		$pgqry_exec = ets_db_query($pgqry) or die(ets_db_error());
		if(ets_db_num_rows($pgqry_exec) > 0){
			$pgarr = ets_db_fetch_array($pgqry_exec);
			return $pgarr['description'];
		}
		else{
			return "!!! Requesting Testimonial Not Found...";
		}
	
	}
function getdesignationlist($type){
	if($type == 'J')
	{
		$nowdate = date('Y-m-d');
		$qry = "Select * from job_type where status = 'E' and expiry_date > '".$nowdate."'";
		$res = ets_db_query($qry) or die(ets_db_error());
		$grp_arr = array();
		
		while($arr = ets_db_fetch_array($res))
		{
			$grp_arr[$arr['job_type_id']] = $arr['designation'];
		}
	}
	else if($type == 'I' || $type == 'P'){
		$nowdate = date('Y-m-d');
		$qry = "Select * from job_type where status = 'E' and expiry_date > '".$nowdate."' and company = '".$type."'";
		$res = ets_db_query($qry) or die(ets_db_error());
		$grp_arr = array();
		
		while($arr = ets_db_fetch_array($res))
		{
			$grp_arr[$arr['job_type_id']] = $arr['designation'];
		}
	}
	else
	{
		$qry = "Select * from designation where status = 'E' and type = '".$type."'";
		$res = ets_db_query($qry) or die(ets_db_error());
		$grp_arr = array();
		
		while($arr = ets_db_fetch_array($res))
		{
			$grp_arr[$arr['designation_id']] = $arr['title'];
		}
		
		$grp_arr['O'] = 'Others';
	}
	return $grp_arr;
}
/* Check if Master have Slaves */

function hasSub($parentid,$tblname,$tblfld){
	$sql = ets_db_query("Select $tblfld from $tblname where parent_id = '".$parentid."' and status = 'E'");
	if(ets_db_num_rows($sql) > 0){
		return true;	
	}else{
		return false;	
	}

}


?>