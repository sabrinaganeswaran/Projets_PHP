<?php
require 'function.php';
require 'design.php';
$flag1 = 0;

$c = 1;
$p = 0;
$q = 0;

while(isset($argv[$c]))
{
	if ($argv[$c][0] == '-')
	{
		if(strpos($argv[$c],'h'))
		{
			echo "\nVous avez demandé de l'aide ? Voici comment on utilise le programme dude ! \n";
			echo "\e[4;36mUsage:\e[0m 'php nox.php \e[0;35m[nom_fichier...]\e[0m [dico] [options]'.\n\n";
			echo "\e[4;36mOptions:\e[0m\nSi besoin ait, n'hésitez à utiliser l'option \e[0;33m'-h'\e[0m.\n";
			echo "Si besoin ait, n'hésitez à utiliser l'option \e[0;33m'-i'(casse insensible)\e[0m.\n";
		}
		if(strpos($argv[$c],'i'))
		{
			$flag1 = 1;
		}
	}
	else
	{
		$message[$q] = $argv[$c];
		$q++;
	}
	$c++;
}
$dico = $message[$q-1];
while($p != $q-1 AND isset($message[$p]))
{
	$debut =  microtime(true);
	if(file_exists($message[$p]) AND file_exists($dico) )
	{
		echo "\n\e[32m\e[1m-------------------- RESULTAT DE LA RECHERCHE: ".$message[$p]." --------------------\e[0m\n";
		
		$fp = fopen($message[$p],'r');
        $data = fread($fp, filesize($message[$p]));
	    fclose($fp);
		$fp = fopen($dico,'r');
	    $data2 = fread($fp, filesize($dico));
		fclose($fp);
		$Words = my_explode(' ',$data);
		$Words2 = my_explode(' ',$data2);
//preg_match_all("#.+\s#", $data, $Words);
//preg_match_all("#.+\s#", $data2, $Words2);
		$n = 0;
		$m = 0;
	/*Debut de l'algorithme de tri 1
	while( isset($Words[$n]) )
	{
		while(isset($Words2[$m]))
		{

			if ($Words[$n] == $Words2[$m])
			{
				echo $Words[$n]."\n";
				$m=0;
				$n++;
			}
			$m++;
		}
		$n++;
		$m=0;
	}
	fin de l'algorithme de tri 1*/

//Debut de l'algorithme de tri 2
	$j = 0;
	while( isset($Words[$n]))
	{
		if($Words[$n] != "")
		{		

			if($flag1)
			{
				if(($pos = stripos($data2, $Words[$n])) AND ( ($data2[$pos-1] == "\n") AND ($data2[$pos+strlen($Words[$n])] == "\n") ) )
				{
					echo $Words[$n]."\n";
					$j++;
				}
			}
			else
			{
				if(($pos = strpos($data2, $Words[$n])) AND ( ($data2[$pos-1] == "\n") AND ($data2[$pos+strlen($Words[$n])] == "\n") ) )
				{
					echo $Words[$n]."\n";
					$j++;
				}	
			}
		}

		$n++;
	}	
	if($n != 0)
	{
		$n--;
	}
    //fin de l'algorithme de tri 2
		$fin =  microtime(true);
		$temps = $fin-$debut;
		echo "\n\e[32m\e[1mRecherche effectue en : ".$temps." sec\e[0m\n";
		echo "\e[32m\e[1mLe fichier contient : ".$n--." mots\e[0m\n";
		echo "\e[32m\e[1mNombre de mots trouves : ".$j." mots\e[0m\n\n";
	}
	else
	{
		if(!file_exists($message[$p]))
			echo "\n\e[31m\e[5m∆ ERREUR : ".$message[$p]." impossible d'ouvrir le fichier. TRY AGAIN DUDE !\e[0m\n";
		if(!file_exists($dico))
			echo "\n\e[31m\e[5m∆ ERREUR : ".$dico." impossible d'ouvrir le dictionnaire.TRY AGAIN DUDE !\e[0m\n\n";
	}
$p++;
echo "See you soon \e[4;34m\e[5mAgent N˚X\e[0m !\n";
//var_dump($Words);
unset($Words);
unset($Words2);
unset($data);
unset($data2);
unset($temps);
}
?>