<?php
/**
 * Created by PhpStorm.
 * User: wq334
 * Date: 2018/6/23
 * Time: 16:59
 */
define('IS_CLI', PHP_SAPI == 'cli' ? true : false);
/**
 * @param $var
 * @param bool $echo
 * @param null $label
 * @param int $flags
 * @return mixed|string|void
 */
function dump($var, $echo = true, $label = null, $flags = ENT_SUBSTITUTE)
{
    $label = (null === $label) ? '' : rtrim($label) . ':';
    ob_start();
    var_dump($var);
    $output = ob_get_clean();
    $output = preg_replace('/\]\=\>\n(\s+)/m', '] => ', $output);
    if (IS_CLI) {
        $output = PHP_EOL . $label . $output . PHP_EOL;
    } else {
        if (!extension_loaded('xdebug')) {
            $output = htmlspecialchars($output, $flags);
        }
        $output = '<pre>' . $label . $output . '</pre>';
    }
    if ($echo) {
        echo($output);
        return;
    } else {
        return $output;
    }
}
#交换位置
function swap(&$arr,$i,$j)
{
    $temp = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $temp;
}