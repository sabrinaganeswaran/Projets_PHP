<?php

function affichage_prompt()
{
  echo"?> ";
}
// -----------                                                                                                                     
function func_pwd($params)
{
  echo getcwd() . "\n";
}
// -----------                                                                                                                     
function func_echo($params)
{
  $i = 1;
  $params = str_replace("\"", "", $params);
  $params = str_replace('\'', '', $params);
  while(isset($params[$i]))
    {
      echo $params[$i], " ";
      $i++;
    }
  echo "\n";
}
// -----------                                                                                                                     
function func_cat($params)
{
  $i = 1;
  $params[$i] = trim ($params[$i], "\n");
  while (isset($params[$i]))
    {
      if (file_exists($params[$i]))
	{
	  if (is_dir($params[$i]))
	    echo "{params[$i]}: is a directory\n";
	  else if (is_readable($params[$i]))
	    {
	      if (($handle = fopen($params[$i], "r")) != NULL)
		{
		  $contenu = fread($handle, filesize($params[$i]));
		    fclose($handle);
		    echo "{$contenu}";
		  }
		else
		  echo " {$params[$i]}: Cannot open file\n";
	    }
	  else
	    echo "{$params[$i]}: Permission denied\n";
	}
      $i++;    
    }
}
// -----------                                                                                                                     
function func_exit()
{
  echo "Vous partez deja ?! Bye.\n";
  echo "[Cher Asset, je suis pour le soudoiement.]\n";
  return (exit);
}