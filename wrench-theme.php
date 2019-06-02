<?php

function folder_error() {
  echo "Неверно указан каталог\n";
}

$line = readline("Укажите каталог в котором установлен Wordpress: ");
if(is_dir($line)) {
  $themes_address = rtrim($line, "/") . "/wp-content/themes/";
  if(is_dir($themes_address)) {
    $folder_name = trim(readline("Название папки темы: "), "/");
    $plugin_address = $themes_address . $folder_name;
    if(!is_dir($plugin_address)) {
      mkdir($plugin_address);
      echo "Создан каталог: " . $folder_name . "\n";
    } else {
      echo "Каталог существует\n";
    }
    file_put_contents($plugin_address . "/index.php", "");
    file_put_contents($plugin_address . "/header.php", "");
    file_put_contents($plugin_address . "/footer.php", "");
    file_put_contents($plugin_address . "/404.php", "");
    file_put_contents($plugin_address . "/page.php", "");
    file_put_contents($plugin_address . "/single.php", "");
    file_put_contents($plugin_address . "/functions.php", "");
    file_put_contents($plugin_address . "/search.php", "");
    file_put_contents($plugin_address . "/front-page.php", "");
    $theme_name = readline("Название темы: ");
    $theme_uri = readline("URI темы: ");
    $theme_desc = readline("Описание темы: ");
    $author = readline("Автор: ");
    $author_uri = readline("URI автора: ");
    file_put_contents($plugin_address . "/style.css",
"/*
Theme Name: $theme_name
Theme URI: $theme_uri
Description: $theme_desc
Author: $author
Author URI: $author_uri
*/");
  } else {
    folder_error();
  }
} else {
  folder_error();
}

die();
