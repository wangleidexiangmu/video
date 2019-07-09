<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use APP\Http\Controllers;
use OSS\OssClient;
class TestController extends Controller
{
    protected $acessKeyId = 'LTAIIsaeBnd5NV1n';
    protected $accessKeySecret = 'UYZh2AKclJbAZJeS3gPnqhzJhcf0MS';
    protected $bucket = 'videoswang';

    public function oss1()
    {
        $client = new OssClient($this->acessKeyId, $this->accessKeySecret, env('ALI_OSS_ENDPOINT'));
        var_dump($client);
        echo '<hr>';
        $obj = '1809a_txt'; //文件名
        $cont = 'Hello World';
        $rs = $client->putObject($this->bucket, $obj, $cont);
        var_dump($rs);
    }

    //上传图片
    public function oss2()
    {
        $client = new OssClient($this->acessKeyId, $this->accessKeySecret, env('ALI_OSS_ENDPOINT'));
        $obj=md5(time().mt_rand(1,9999999)).'.jpg';
        $local_file='1.png';
        $rs=$client->uploadFile($this->bucket,$obj,$local_file);
        var_dump($rs);
    }
}