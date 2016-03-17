<?php
/**
 * 机器审核得接口
 * by zhangliu
 */

namespace App\Jzpost\Services;
use \Util\Tools\SimpleRpcService;
use \App\Jzpost\Verify\Robot;
class RobotVerify extends SimpleRpcService
{
    public function bannedWordsCheck($params)
    {
        $baseData = $params['baseData'];
        $robot = new Robot($baseData['uniqueName'] , $baseData['uniqueId'] , $baseData['type']);
        try{
            $res = $robot->bannedWordsCheck($params['data']);
            return $this->returnMessage($res);
        }
        catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public function agentCheck($params)
    {
        $baseData = $params['baseData'];
        $robot = new Robot($baseData['uniqueName'] , $baseData['uniqueId'] , $baseData['type']);
        try{
            $res = $robot->agentCheck($params['data']);
            return $this->returnMessage($res);
        }
        catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public function rejectCheck($params)
    {
        $baseData = $params['baseData'];
        $robot = new Robot($baseData['uniqueName'] , $baseData['uniqueId'] , $baseData['type']);
        try{
            $res = $robot->rejectCheck($params['data']);
            return $this->returnMessage($res);
        }
        catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public function addReject($params)
    {
        $baseData = $params['baseData'];
        $robot = new Robot();
        try{
            $res = $robot->addReject($params['data']);   
            return $this->returnMessage($res);
        }
        catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }


    public function delReject($params)
    {
        $baseData = $params['baseData'];
        $robot = new Robot();
        try{
            $res = $robot->delReject($params['data']);   
            return $this->returnMessage($res);
        }
        catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public function extractCheck($params)
    {
        $baseData = $params['baseData'];
        $robot = new Robot($baseData['uniqueName'] , $baseData['uniqueId'] , $baseData['type']);
        try{
            $res = $robot->extractCheck($params['data']);
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


