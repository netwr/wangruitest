<?php
/**
 * 入人工审核得http接口
 * by zhangliu
 */

namespace App\Jzpost\Services;
use \Util\Tools\SimpleRpcService;
use \App\Jzpost\Verify\People;

class PeopleVerify extends SimpleRpcService
{
    public function intoPeopleVerify($params)
    {
        $baseData = $params['baseData'];
        $pelple = new People($baseData['uniqueName'] , $baseData['uniqueId'] , $baseData['type']);
        try{
            $res = $pelple->intoPeopleVerify($params['data']);
            return $this->returnMessage($res);
        }
        catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public function returnMessage($res)
    {
        $data = [
            'status' => $res,
        ];
        return $data;
    }
}