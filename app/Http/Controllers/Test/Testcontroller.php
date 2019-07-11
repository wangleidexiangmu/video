<?php

namespace App\Http\Controllers\Test;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use APP\Http\Controllers;
use Illuminate\Support\Str;
use OSS\OssClient;
use App\Model\video;
class TestController extends Controller
{
    protected $acessKeyId = 'LTAIIsaeBnd5NV1n';
    protected $accessKeySecret = 'UYZh2AKclJbAZJeS3gPnqhzJhcf0MS';
    protected $bucket = 'videoswang';

    public function oss1()
    {
        $client = new OssClient($this->acessKeyId, $this->accessKeySecret, env('ALI_OSS_ENDPOINT'));
        var_dump($client);
        $obj = '1809txt'; //文件名
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

    //上传视频
    public function oss3(){
        $client = new OssClient($this->acessKeyId, $this->accessKeySecret, env('ALI_OSS_ENDPOINT'));
        //获取目录中的文件
        $file_path=storage_path('app/public/files');
        echo 'storage path :'.$file_path;echo'<hr>';
        $file_list=scandir($file_path);
        echo '<pre>';print_r($file_list);echo '</pre>';echo '<hr>';
        foreach ($file_list as $k=>$v){
            if($v=='.'||$v=='..'){
                continue;
            }
            //上传
            $file_name=Str::random(5).'.jpg';
            $local_file=$file_path.'/'.$v;
            echo '本地文件:'.$local_file;echo '</br>';
            //$rs=$client->uploadFile($this->bucket,$file_name,$file_path.'/');
            try{
                $client->uploadFile($this->bucket,$file_name,$local_file);
            }catch (OssException $e){
                printf(__FUNCTION__.":FATLED\n");
                printf($e->getMessage()."\n");
                return;
            }
            //上传成功后  删除本地文件
            echo $local_file.'上传成功';echo"</br>";echo "<hr>";echo "<hr>";
            unlink($local_file);
        }

    }
    public function add(){
       $data=video::first()->toArray();
       var_dump($data);
       return view('video.video',['data'=>$data]);
    }
}
