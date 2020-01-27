<?php
/**
 * page variables
 */
	switch ($_SERVER["SCRIPT_NAME"]) {
		case "/mira-php/about.php":
			$CURRENT_PAGE = "About"; 
			$PAGE_TITLE = "About mira";
			break;
		case "/mira-php/contact.php":
			$CURRENT_PAGE = "Contact"; 
			$PAGE_TITLE = "Contact me";
			break;	
                case "/mira-php/input-form.php":
			$CURRENT_PAGE = "Input form"; 
			$PAGE_TITLE = "Input form";
			break;
		default:
			$CURRENT_PAGE = "Index";
			$PAGE_TITLE = "Welcome to mira-php!";
	}
?>