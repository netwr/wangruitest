<?php
/**
 * 自动加载类:目录首字母小写，类文件名首字母大写，以".php"作为后缀
 *
 * @author  Shen Xi<shenxi@ganji.com>:
 * @date 2015-08-14 07:40:14
 **/

//定义文件根目录
if (!defined('BServicesRoot')) {
    define('BServicesRoot', dirname(__FILE__) . '/');
    BServicesAutoloader::Register();
}

//加载php_base下的自动加载文件
require_once BServicesRoot . '../php_base/Autoloader.php';
class BServicesAutoloader {
    /**
     * 注册自动加载方法
     */
    public static function Register()
    {
        if (function_exists('__autoload')) {
            spl_autoload_register('__autoload');
        }
        //注册自动加载函数
        return spl_autoload_register(array('BServicesAutoloader', 'Load'), true, true);
    }


    /**
     * 实现自动加载的方法
     *
     * @param $className string 自动加载的类名
     * @return false | void
     */
    public static function Load($className)
    {
        //如果类已经存在，返回
        if (class_exists($className,FALSE)) {
            return FALSE;
        }

        $arr = array();
        //使用命名空间
        if(stripos($className, "\\") !== false){
            $arr = explode("\\", $className);
        }elseif(stripos($className, "_") !== false){//使用下划线分割目录
            $arr = explode("_", $className);
        }else{
            $arr = array($className);
        }

        //文件名
        $filename = array_pop($arr);
        //文件路径
        $classFilePath = BServicesRoot;
        if(!empty($arr)){
            foreach($arr as $val){
                //默认目录首字母为小写
                $classFilePath .= lcfirst($val) . "/";
            }
        }

        //文件全路径
        $classFilePath .=  $filename .'.php';

        //文件不存在或没有读权限，返回false
        if ((file_exists($classFilePath) === FALSE) || (is_readable($classFilePath) === FALSE)) {
            return FALSE;
        }

        require($classFilePath);
    }
}
