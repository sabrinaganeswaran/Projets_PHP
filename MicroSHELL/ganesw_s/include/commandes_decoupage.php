<?php

function decoup_params($line)
{
  return (explode(' ', $line));
}

function func_clear($params)
{
  echo "\033c";
}