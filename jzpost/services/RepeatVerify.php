<?php
/**
 * 检查职位在线上是否重复
 * by zhangliu
 */

namespace App\Jzpost\Services;
use \Util\Tools\SimpleRpcService;
use \App\Jzpost\Verify\Repeat;

class RepeatVerify extends SimpleRpcService
{
    public function checkRepeat($params)
    {
        $companyData = [];
        $postData = [];
        if(isset($params['companyData']))
        {
            $companyData = $params['companyData'];
        }
        if(isset($params['postData']))
        {
            $postData = $params['postData'];
        }
        $repeat = new Repeat();
        try{
            $res = $repeat->repeatCheck($companyData , $postData);
            return $res;
        }
        catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

}