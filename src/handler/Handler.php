<?php
/** Created By wene<354007048@qq.com> . Date at 2020/5/13 */

namespace think\annotation\handler;


use Doctrine\Common\Annotations\Annotation;

abstract class Handler implements HandleInterface
{

    public function cls(\ReflectionClass $refClass, Annotation $annotation, \think\Route\RuleGroup &$route)
    {
        // TODO: Implement cls() method.
    }

    public function func(\ReflectionMethod $refMethod, Annotation $annotation, \think\route\RuleItem &$rule)
    {
        // TODO: Implement func() method.
    }

    /**
     * 判断是否是当前请求
     * @param \ReflectionMethod $refMethod
     * @param \think\route\RuleItem $rule
     * @return bool
     */
    public function isCurrentMethod(\ReflectionMethod $refMethod,\think\route\RuleItem $rule){
        if (strtolower(PHP_SAPI) != 'cli'){
            if (strtolower(request()->method()) !== strtolower($rule->getMethod())) return false;
            $routeRule = $rule->parseUrlPath($rule->getRule());
            $requestRule = $rule->parseUrlPath(explode("?",request()->url())[0]);
            if (count($requestRule) !== count($routeRule))return false;
            foreach($requestRule as $k => $v){
                if($requestRule[$k] !== $routeRule[$k]){
                    if (!strstr($routeRule[$k],'<')){
                        return false;
                    }
                }
                continue;
            }
            return true;
        }
        return false;
    }
}