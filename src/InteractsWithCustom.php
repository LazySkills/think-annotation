<?php
/** Created By wene<354007048@qq.com> . Date at 2020/5/13 */

namespace think\annotation;

use Doctrine\Common\Annotations\Reader;
use think\App;

/**
 * Trait InteractsWithRoute
 * @package think\annotation\traits
 * @property App $app
 * @property Reader $reader
 */
trait InteractsWithCustom
{
    protected $custom = [];

    protected function registerCustomClassAnnotations(\ReflectionClass $refClass,&$routeGroup)
    {
        if ($this->checkCustomIsEnable()){
            foreach ($this->custom as $decorator => $hander){
                if ($this->reader->getClassAnnotation($refClass, $decorator)){
                    $annotation = $this->reader->getClassAnnotation($refClass, $decorator);
                    (new $hander())->cls($refClass, $annotation, $routeGroup);
                }else{
                    continue;
                }
            }
        }
    }

    protected function registerCustomMethodAnnotations(\ReflectionMethod $refMethod,&$rule)
    {
        if ($this->checkCustomIsEnable()) {
            foreach ($this->custom as $decorator => $hander){
                if ($this->reader->getMethodAnnotation($refMethod, $decorator)){
                    $annotation = $this->reader->getMethodAnnotation($refMethod, $decorator);
                    (new $hander())->func($refMethod, $annotation, $rule);
                }else{
                    continue;
                }
            }
        }
    }

    private function checkCustomIsEnable()
    {
        if ($this->app->config->get('annotation.route.enable', true)){
            $this->custom = config('annotation.custom.namespaces',[]);
            if (!empty($this->custom)){
                return true;
            }
        }
        return false;
    }


}