<?php

require_once "controller/OwnerController.class.php";
require_once "controller/PetController.class.php";

/**
 * Class that controls the user's requests sent to the main section of the website.
 */
class MainController
{
    /**
     * This method is called by the index.php and it is the first method called in the application.
	 * It displays the Main Menu, and calls a controller's processRequest() method depending on the $_GET variable (URL menu param).
     */
	public function processRequest()
	{
		// Always display Main Menu:
		include("view/menu/MainMenu.html");

		// Set $request depending on the $_GET variable (URL menu param):
		
		if (isset($_GET["menu"])) $request = $_GET["menu"];
		else $request = NULL;
		
		// Process the $request by calling the processRequest() method of a controller:

		switch ($request)
		{
			case "owner": // URL: [...]/index.php?menu=owner
				$ownerController = new OwnerController();
				$ownerController->processRequest();
				break;

			case "pet": // URL: [...]/index.php?menu=pet
				$petController = new PetController();
				$petController->processRequest();
				break;
			
				
		}
	}
}