<?php
/**
 * Created by PhpStorm.
 * User: Bastian
 * Date: 09-11-2017
 * Time: 08:46
 */
//$x = $_REQUEST['x'];
//$y = $_REQUEST['y'];

//$result = $x + $y;
if (isset($_POST['Number1'])) {
    $number1 = $_REQUEST['Number1'];
    $number2 = $_REQUEST['Number2'];
    $operator = $_REQUEST['Operator'];
    $result = calculate($number1, $number2, $operator);
} else {
    $result = 0;
}
function calculate($number1, $number2, $operator)
{
    $result = 0;
    switch ($operator) {
        case "+":
            $result = $number1 + $number2;
            break;

        case "-":
            $result = $number1 - $number2;
            break;

        case "*":
            $result = $number1 * $number2;
            break;

        case "/":
            $result = $number1 / $number2;
            break;
    }
    return $result;
}

require_once '../vendor/autoload.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../views');
$twig = new Twig_Environment($loader, array(
    // 'cache' => '/path/to/compilation_cache',
    'auto_reload' => true
));
$template = $twig->loadTemplate('showit.html.twig');
$parametersToTwig = array("result" => $result);
echo $template->render($parametersToTwig);


?>


