<?php
/**
 * Created by PhpStorm.
 * User: weng
 * Date: 7/15/21
 * Time: 11:27 AM
 */
namespace Uniondrug\PhpServiceReport;

use Uniondrug\Framework\Container;
use Uniondrug\Framework\Services\Service;
use Uniondrug\Phar\Server\Services\Http;

class PhpServiceReportService extends Service
{

    private $postRpt= [
        'productNo'=>'',//产品编码
        'moduleNo'=>'',//模块编码
        'projectVersion'=>'',//模块版本
        'gitCommitId'=>'',//git commit id
        'gitTag'=>'',//gitTag
        'gitBranch'=>'',//git 打包分支
        'gitCommitTime'=>'',//git 提交时间
        'serviceIp'=>'',//服务所在ip
        'serviceNode'=>'',//服务k8s节点名称 环境变量的NODE_NAME
    ];
    /**
     * @return mixed
     * @throws \Exception
     */
    public function getSwoole()
    {
        /**
         * @var Container $di
         */
        $di = $this->di;
        $swoole = $di->getShared('server');
        if ($swoole instanceof Http) {
            return $swoole;
        }
        throw new \Exception("非swoole 模式不可启用服务上报");
    }

    //构造函数 初始化时进行服务上报
    public function __construct()
    {
       //实现上报

    }

    public function getProductNo()
    {
        return $this->config->get('app.appName');
    }

    public function getModuleNo()
    {
        return $this->config->get('app.appName');
    }

    public function getProjectVersion()
    {
        return $this->config->get('app.appVersion');
    }

    public function getGitCommitId()
    {

        // GIT Commit
        $buffer = shell_exec("cd '".getcwd()."' && git log -1");
        if (preg_match("/commit\s+([^\n]+)/i", $buffer, $m) > 0) {
            $commit = $m[1];
        }
       return $commit;
    }

    public function getGitTag()
    {

    }
}