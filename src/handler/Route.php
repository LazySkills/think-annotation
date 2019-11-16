<?php
/** Created by 嗝嗝<china_wangyu@aliyun.com>. Date: 2019-11-14  */

namespace think\annotation\handler;


use Doctrine\Common\Annotations\Annotation;

class Route extends Handler
{

    public function func(\ReflectionMethod $refMethod, Annotation $annotation, \think\Route &$route)
    {
        // TODO: Implement handleMethod() method.
        $route->addRule($annotation->value, "{$refMethod->class}@{$refMethod->name}", $annotation->method)->option($annotation->getOptions());
    }
}