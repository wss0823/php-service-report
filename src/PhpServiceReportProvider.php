<?php
/**
 * Created by PhpStorm.
 * User: weng
 * Date: 7/15/21
 * Time: 11:22 AM
 */

namespace Uniondrug\PhpServiceReport;

class PhpServiceReportProvider implements \Phalcon\Di\ServiceProviderInterface
{
    public function register(\Phalcon\DiInterface $di)
    {
        $di->set(
            'phpServiceReportService',
            function () {
                return new  PhpServiceReportService();
            }
        );
    }
}