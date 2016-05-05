<?php
/**
 * @package WordPress
 * @subpackage CoreDial Intranet
 */
 	
	# Redirects for existing Google links, just to keep those rankings up.
	function fnc_call_redirect($new_location){ // This will tell Google that their link is wrong and they should fix it.
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: /".$new_location);
	}

  	if(strpos($_SERVER['REQUEST_URI'], "aboutus.shtml") <> 0){fnc_call_redirect("about-us/"); }
  	if(strpos($_SERVER['REQUEST_URI'], "upcoming.shtml") <> 0){fnc_call_redirect("new-releases/"); }
  	if(strpos($_SERVER['REQUEST_URI'], "specialevents.shtml") <> 0){fnc_call_redirect("special-events/"); }
  	if(strpos($_SERVER['REQUEST_URI'], "demos.shtml") <> 0){fnc_call_redirect("demos/"); }
	if(strpos($_SERVER['REQUEST_URI'], "calendars/") <> 0){	fnc_call_redirect("calendar/"); }
	if(strpos($_SERVER['REQUEST_URI'], "calendar.shtml") <> 0){	fnc_call_redirect("calendar/"); }
  	if(strpos($_SERVER['REQUEST_URI'], "links.shtml") <> 0){fnc_call_redirect("links/"); }
  	if(strpos($_SERVER['REQUEST_URI'], "storehours.shtml") <> 0){fnc_call_redirect("games/store-hours-directions/"); }
  	if(strpos($_SERVER['REQUEST_URI'], "directions_holmes.shtml") <> 0){fnc_call_redirect("store-hours-directions/#holmes"); }
  	if(strpos($_SERVER['REQUEST_URI'], "directions_bluebell.shtml") <> 0){fnc_call_redirect("store-hours-directions/#blue_bell"); }
  	if(strpos($_SERVER['REQUEST_URI'], "contactus.shtml") <> 0){fnc_call_redirect("contact-us/"); }

  	if(strpos($_SERVER['REQUEST_URI'], "magic.shtml") <> 0){fnc_call_redirect("games/magic-the-gathering/"); }
	if(strpos($_SERVER['REQUEST_URI'], "yugioh.shtml") <> 0){fnc_call_redirect("games/yu-gi-oh/"); }
	if(strpos($_SERVER['REQUEST_URI'], "images/YuGiOh%20Decklist%20-%20Konami.pdf") <> 0){fnc_call_redirect("wp-content/uploads/2010/03/YuGiOh-Decklist-Konami.pdf"); }
  	if(strpos($_SERVER['REQUEST_URI'], "boardgamesnz.shtml") <> 0){fnc_call_redirect("games/board-games/"); }
  	if(strpos($_SERVER['REQUEST_URI'], "boardgamesam.shtml") <> 0){fnc_call_redirect("games/board-games/"); }
  	if(strpos($_SERVER['REQUEST_URI'], "cribbage.shtml") <> 0){fnc_call_redirect("games/cribbage/"); }
  	if(strpos($_SERVER['REQUEST_URI'], "ddminis.shtml") <> 0){fnc_call_redirect("games/dungeons-and-dragons/"); }
  	if(strpos($_SERVER['REQUEST_URI'], "d_and_d.shtml") <> 0){fnc_call_redirect("games/dungeons-and-dragons/"); }
  	if(strpos($_SERVER['REQUEST_URI'], "flamesofwar.shtml") <> 0){fnc_call_redirect("games/flames-of-war/"); }
  	if(strpos($_SERVER['REQUEST_URI'], "l5r.shtml") <> 0){fnc_call_redirect("games/legend-of-the-five-rings/"); }
  	if(strpos($_SERVER['REQUEST_URI'], "naruto.shtml") <> 0){fnc_call_redirect("games/naruto/"); }
  	if(strpos($_SERVER['REQUEST_URI'], "pokemon.shtml") <> 0){fnc_call_redirect("games/pokemon/"); }
  	if(strpos($_SERVER['REQUEST_URI'], "vampire.shtml") <> 0){fnc_call_redirect("games/vampire-the-eternal-struggle/"); }
  	if(strpos($_SERVER['REQUEST_URI'], "warhammer40k.shtml") <> 0){fnc_call_redirect("games/warhammer-40k/"); }
  	if(strpos($_SERVER['REQUEST_URI'], "ArdBoyzRulzPacket08.pdf") <> 0){fnc_call_redirect("games/warhammer-40k/"); }
  	if(strpos($_SERVER['REQUEST_URI'], "worldofwarcraft.shtml") <> 0){fnc_call_redirect("games/world-of-warcraft/"); }
  	if(strpos($_SERVER['REQUEST_URI'], "WOW%20Gauntlet/") <> 0){fnc_call_redirect("games/world-of-warcraft/"); }
  	if(strpos($_SERVER['REQUEST_URI'], "rawdeal.shtml") <> 0){fnc_call_redirect(""); }
  	if(strpos($_SERVER['REQUEST_URI'], "starwarsminis.shtml") <> 0){fnc_call_redirect(""); }
  	if(strpos($_SERVER['REQUEST_URI'], "ufs.shtml") <> 0){fnc_call_redirect(""); }
 	if(strpos($_SERVER['REQUEST_URI'], "bleach.shtml") <> 0){fnc_call_redirect(""); }
  	if(strpos($_SERVER['REQUEST_URI'], "accessories.shtml") <> 0){fnc_call_redirect("accessories/"); }
	

	get_header();
	get_sidebar();
?>
    <div id="content" class="narrowcolumn">
     <h2 class="center">Error 404 - Not Found</h2>
<?php if(function_exists("aa_google_404"))aa_google_404(); ?>
<?php if(function_exists("useful404s"))useful404s(); ?>

    </div>
<?php get_footer(); ?>