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
        echo 1111;
    }
}