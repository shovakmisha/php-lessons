<?php ## Составление URL по массивут параметров.
  // Составляет URL по частям из массива $parsed.
  // Функция обратна к parse_url().
  function http_build_url($parsed)
  {
    if (!is_array($parsed)) return false;

    echo '<pre>';
        print_r($parsed);
    echo '</pre>';

    // Задан протокол?
    if (isset($parsed['scheme'])) {
      $sep = ( strtolower($parsed['scheme'] ) == 'mailto' ? ':' : '://');
      $url = $parsed['scheme'] . $sep;
    } else {
      $url = '';
    }

    // Задан пароль или имя пользователя?
    if (isset($parsed['pass'])) {
      $url .= "$parsed[user]:$parsed[pass]@";
    } elseif (isset($parsed['user'])) {
      $url .= "$parsed[user]@";
    }

    // QUERY_STRING представлена в виде массива?
    if (@!is_scalar($parsed['query'])) {
      // Преобразуем в строку.
	    echo $parsed['query']; echo 5555; echo '<br>';
	    $parsed['query'] = http_build_query($parsed['query']);
	    echo '<br>';
    }

    // Дальше составляем URL.
    if (isset($parsed['host']))     $url .= $parsed['host'];
    if (isset($parsed['port']))     $url .= ":".$parsed['port'];
    if (isset($parsed['path']))     $url .= $parsed['path'];
    if (isset($parsed['query']))    $url .= "?".$parsed['query'];
    if (isset($parsed['fragment'])) $url .= "#".$parsed['fragment']; 
    return $url; 
  }

?>