<?php
function func_cd($params)
{
  $i = 1;
  if(!isset($params[$i]))
    {
      $home = getenv('HOME');
      chdir($home);
    }
  if (isset($params[$i]))
    $params[$i] = trim($params[$i], "\n");
  while (isset($params[$i]))
    {
      if (file_exists($params[$i]))
        {
          if (is_dir($params[$i]))
            {
              chdir($params[$i]);
            }
          else
            echo "{$params[$i]}: is a directory\n";
        }
      else
        echo "{$params[$i]}: No such file or directory\n";
      $i++;
    }
}

function func_ls($params)
{
  $i = 1;
  if (isset($params[0][$i]))
    {
      $j = 0;
      $tab = scandir('./');
      // print_r($tab);
      while (isset($tab[$j]))
	{
	  echo $tab[$j] . "\n";
          $j++;
        }
    }
  if (!(isset($params[0][$i])))
    {
      $j = 0;
      $tab = scandir($params[0][$i]);
      print_r($tab);
      while (isset($tab[$j]))
        {
          echo $tab[$j] . "\n";
          $j++;
        }
    }
}
