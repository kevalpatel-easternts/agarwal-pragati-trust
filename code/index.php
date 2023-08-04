<?php
	include "inc/mainapp.php";
	include "inc/content_function.php" ;
	switch($module){
		case 'testimonials':
			$pageTitle="Testimonials";
			$title="Testimonials".SITENAME;
			$keyword = $title;
			$description = $title;
			$content_include = "content/testimonial.php";
			include DIR_WS_TEMPLATE."testimonial_page.tpl.php";
			break;
	
		case 'gallery':
			$pageTitle = "Photo Gallery";
			$title = "Photo Gallery".SITENAME;
			$keyword = $title;
			$description = $title;
			$content_include = "content/gallery.php";
			include DIR_WS_TEMPLATE."gallery_page.tpl.php";
			break;
		case 'videogallery':
			$pageTitle = "Video Gallery";
			$title = "Video Gallery".SITENAME;
			$keyword = $title;
			$description = $title;
			$content_include = "content/video.php";
			include DIR_WS_TEMPLATE."video_page.tpl.php";
			break;
		case 'member':
			$pageTitle = "Members";
			$title = "Members".SITENAME;
			$keyword = $title;
			$description = $title;
			$content_include = "content/member.php";
			include DIR_WS_TEMPLATE."member_page.tpl.php";
			break;
		case 'career':
			$pageTitle = "Career";
			$title = "Career".SITENAME;
			$keyword = $title;
			$description = $title;
			$content_include = "content/career.php";
			include DIR_WS_TEMPLATE."career_page.tpl.php";
			break;
		case 'donation':
			$pageTitle = "Donation";
			$title = "Donation".SITENAME;
			$keyword = $title;
			$description = $title;
			$content_include = "content/donation.php";
			include DIR_WS_TEMPLATE."donation_page.tpl.php";
			break;
		case 'the-hall':
			$page_res1 = get_record_from_db('projects','projectID','1');
			$pageTitle="About The Hall";
			$title="About The Hall".SITENAME;
			$keyword = $title;
			$description = $title;
			$content_include = "content/hall.php";
			include DIR_WS_TEMPLATE."hall_page.tpl.php";
			break;
		case 'downloads':
			$pageTitle = "Downloads";
			$title = $pageTitle.SITENAME;
			$keyword = $title;
			$description = $title;
			$content_include = "content/downloads.php";
			include DIR_WS_TEMPLATE."downloads_page.tpl.php";		
		break;		
		case 'News':
			
			$pageTitle = "News & Events";
			$title = "News & Events".SITENAME;
			$keyword = $title;
			$description = $title;
			$news_type = $module."/".$url_slug;
			$content_include = "content/news.php";
			include DIR_WS_TEMPLATE."news_page.tpl.php";
			break;
			
	   case 'environment':
		
			$page_res = get_record_from_db('environment','environment_id',$module_id);
			
			$title = $page_res['meta_title'].SITENAME;
			$keyword = $page_res['meta_keyword'];
			$description = $page_res['meta_desc'];
			$pageTitle = $page_res['title'];
			$pageContent = "content/environment.php";;
			include DIR_WS_TEMPLATE."environment_page.tpl.php";
			break;
		
		case 'contact-us':
			$pageTitle="Contact Us";
			$title="Contact Us - Welcome to - Agrawal Pragati Trust, Surat";
			$keyword = $title;
			$description = "Welcome to - Agrawal Pragati Trust, Surat";
			
			$content_include = "content/contact_us.php";
			include DIR_WS_TEMPLATE."form_page.tpl.php";
			break;
       
			case 'pages':
		
			$page_res = get_record_from_db('page_master','page_id',$module_id);
			
			$title = $page_res['meta_title'].SITENAME;
			$keyword = $page_res['meta_keyword'];
			$description = $page_res['meta_desc'];
			$pageTitle = $page_res['page_title'];
			$pageContent = $page_res['page_content'];
			
				$content_include = "content/about.php";
				include DIR_WS_TEMPLATE.'about_page.tpl.php';
				break;	
		case 'home':
		default:
			$page = "Agrawal Pragati Trust | Providing better social, financial, educational and medical growth to people of Surat | Gujarat";
			$keyword = "Agrawal Pragati Trust | Providing better social, financial, educational and medical growth to people of Surat | Gujarat";
			$description = "Agrawal Pragati Trust | Providing better social, financial, educational and medical growth to people of Surat | Gujarat";
			$content_include = "content/index.php";
			$pageTitle ="Agrawal Pragati Trust | Providing better social, financial, educational and medical growth to people of Surat | Gujarat";
			$title = "Agrawal Pragati Trust | Providing better social, financial, educational and medical growth to people of Surat | Gujarat";
			
			include DIR_WS_TEMPLATE."main_page.tpl.php";	
			break;
	}	
	
?>
