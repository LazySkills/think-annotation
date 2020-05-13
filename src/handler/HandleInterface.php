<?php
/** Created By wene<354007048@qq.com> . Date at 2020/5/13 */

namespace think\annotation\handler;


namespace think\annotation\handler;


use Doctrine\Common\Annotations\Annotation;

interface HandleInterface
{
    public function cls(\ReflectionClass $refClass,Annotation $annotation, \think\Route\RuleGroup &$route);

    public function func(\ReflectionMethod $refMethod,Annotation $annotation,\think\route\RuleItem &$rule);
}