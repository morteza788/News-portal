<?php

function dd($value, $die = true){
    var_dump($value);
    if($die)
    exit();
}

function view($dir , $vars = null){

    $dir = str_replace('.' , '/',$dir);
    if($vars)
    extract($vars);
    $path =("resources/view/".$dir.".php");
    if(file_exists($path)){
        return require_once($path);
    }
    else
    echo "this view [".$dir."] not exist";
}

function redirect($url){
    header("Location: ". trim(currentDomain(), '/ ') . '/' . trim($url, '/ '));
    exit();
}

function redirectBack(){
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit();
}


function asset($src){
    $domain = trim(CURRENT_DOMAIN, '/ ');
    $src = $domain . '/' . trim($src, '/ ');
    return $src;
}

function img($src){
  $domain = trim(CURRENT_DOMAIN, '/ ');
  $src = $domain . '/' . trim($src, '/ ');
  return $src;
}

function url($url){
    $domain = trim(CURRENT_DOMAIN, '/ ');
    $url = $domain . '/' . trim($url, '/ ');
    return $url;
}

function protocol(){
    return stripos($_SERVER['SERVER_PROTOCOL'],'https')=== true ? 'https://' : 'http://';
}

function currentDomain(){
    return protocol() . $_SERVER['HTTP_HOST'];
}

function currentUrl(){
    return currentDomain() . $_SERVER['REQUEST_URI'];
}

function methodField(){
    return $_SERVER['REQUEST_METHOD'];
}

//flash-message

function success($name = '', $message = '', $class = 'alert alert-success text-center'){
    if(!empty($name)){
      if(!empty($message) && empty($_SESSION[$name])){
        if(!empty($_SESSION[$name])){
          unset($_SESSION[$name]);
        }

        if(!empty($_SESSION[$name. '_class'])){
          unset($_SESSION[$name. '_class']);
        }

        $_SESSION[$name] = $message;
        $_SESSION[$name. '_class'] = $class;
      } elseif(empty($message) && !empty($_SESSION[$name])){
        $class = !empty($_SESSION[$name. '_class']) ? $_SESSION[$name. '_class'] : '';
        echo '<div class="'.$class.'" id="msg-flash">'.$_SESSION[$name].'</div>';
        unset($_SESSION[$name]);
        unset($_SESSION[$name. '_class']);
      }
    }
  }

  function error($name = '', $message = '', $class = 'alert alert-danger text-center'){
    if(!empty($name)){
      if(!empty($message) && empty($_SESSION[$name])){
        if(!empty($_SESSION[$name])){
          unset($_SESSION[$name]);
        }

        if(!empty($_SESSION[$name. '_class'])){
          unset($_SESSION[$name. '_class']);
        }

        $_SESSION[$name] = $message;
        $_SESSION[$name. '_class'] = $class;
      } elseif(empty($message) && !empty($_SESSION[$name])){
        $class = !empty($_SESSION[$name. '_class']) ? $_SESSION[$name. '_class'] : '';
        echo '<div class="'.$class.'" id="msg-flash">'.$_SESSION[$name].'</div>';
        unset($_SESSION[$name]);
        unset($_SESSION[$name. '_class']);
      }
    }
  }


