<?php




//admin
uri('admin', 'AdminController', 'index');

//category
uri('admin/category', 'CategoryController', 'index');
uri('admin/category/create', 'CategoryController', 'create');
uri('admin/category/edit/{id}', 'CategoryController', 'edit');
uri('admin/category/store', 'CategoryController', 'store', 'POST');
uri('admin/category/update/{id}', 'CategoryController', 'update', 'POST');
uri('admin/category/destroy/{id}', 'CategoryController', 'destroy');

//article
uri('admin/article', 'ArticleController', 'index');
uri('admin/article/create', 'ArticleController', 'create');
uri('admin/article/edit/{id}', 'ArticleController', 'edit');
uri('admin/article/store', 'ArticleController', 'store', 'POST');
uri('admin/article/update/{id}', 'ArticleController', 'update', 'POST');
uri('admin/article/destroy/{id}', 'ArticleController', 'destroy');


//home
uri('/', 'HomeController', 'index');






/**
 * route not match - 404 error
 */

http_response_code(404);
include __DIR__ . DIRECTORY_SEPARATOR . 'View' . DIRECTORY_SEPARATOR . '404.php';
exit;












function uri($reservedUrl,$class,$method,$requestMethod = 'GET'){

    //current url array
    $currentUrl = explode('?', currentUrl())[0];
    $currentUrl = str_replace(CURRENT_DOMAIN, '', $currentUrl);
    $currentUrl = trim($currentUrl,'/');
    $currentUrlArray = explode('/', $currentUrl);
    $currentUrlArray = array_filter($currentUrlArray);

    //reserved url array
    $reservedUrl = trim($reservedUrl, '/');
    $reservedUrlArray = explode('/', $reservedUrl);
    $reservedUrlArray = array_filter($reservedUrlArray);


    if (sizeof($currentUrlArray) != sizeof($reservedUrlArray) || methodField() != $requestMethod) {
        return false;
    }

    //match
    $parameters = [];
    for ($key = 0; $key < sizeof($currentUrlArray); $key++) {
        if ($reservedUrlArray[$key][0] == '{' && $reservedUrlArray[$key][strlen($reservedUrlArray[$key]) - 1] == '}')
        {
            array_push($parameters, $currentUrlArray[$key]);
        }
         elseif($currentUrlArray[$key] !== $reservedUrlArray[$key]) {
            return false;
        }
    }

    //request parameter
    if(methodField() == 'POST') {
        $request = isset($_FILES) ? array_merge($_POST, $_FILES) : $_POST;
        $parameters = array_merge([$request], $parameters);
    }

    $class = "App\Http\Controllers\\" . $class;
    $object= new $class;
    call_user_func_array(array($object, $method), $parameters);
    exit();
}