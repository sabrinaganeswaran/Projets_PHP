<?php

require_once('include/commandes_affichage_prompt.php');
require_once('include/commandes_decoupage.php');  
require_once('include/cap2.php');

$fd = fopen('php://stdin', 'r');
func_clear($params);
if ($fd !== false)
  {
    echo "-------------------------------------------------------------------------------------------------------\n";
    echo "Bienvenue dans le Microshell ! Vous pouvez à présent l'utiliser et entrer vos commandes !\n";   
    affichage_prompt();
    while (($line = fgets($fd)) !== FALSE)
      {
	$line = trim($line, " ");
	$params = decoup_params($line);
	$ptr = 'func_' . trim($params[0] , "\n");
	if (function_exists($ptr))
	  $ptr($params);
	else
	  echo "Desolee, votre commande est inexistante dans notre MicroShell!\n";
	affichage_prompt();
      }
    fclose($fd);
  }