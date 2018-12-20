<?php
Swoole::$php->http->header('Gateway-Interface', 'PHP-7.1');
Swoole::$php->http->header("Content-Type", "text/html; charset=utf-8");
if(Swoole::$php->request->get){
    $data = Swoole::$php->request->get;
//    if(empty($data['question_id'] || empty($data['lesson_id']))) return false;
    //整理数据并进行类型转换
//    $create["type"] = (string)$data['type']; //消息类型
//    $create["student_id"] = (int)$data['student_id']; //学生id
//    $create["unique_id"] = (string)$data['unique_id']; //题消息id


    $create["type"] = (string)100; //消息类型
    $create["student_id"] = (int)200; //学生id
    $create["unique_id"] = (string)300; //题消息id
    $create["create_time"] = time(); //ack时间
    //写入数据
    require_once dirname(__DIR__). '/vendor/autoload.php';
    $url = "mongodb://dds-2ze62347b04769441.mongodb.rds.aliyuncs.com:3717/" ;
    $option['username'] = 'root' ;
    $option['password'] = 'kjZ0gS0Lh5sxXd98' ;
    $client = new MongoDB\Client($url,$option) ;
    $result =  $client->live_video->ack->insertOne($create) ;
    if ($result->getInsertedCount()) {
        echo '写入成功' ;
    }else{
        echo '写入失败' ;
    }


}
