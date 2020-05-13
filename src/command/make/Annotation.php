<?php
/** Created By wene<354007048@qq.com> . Date at 2020/5/13 */

namespace think\annotation\command\make;

use think\console\command\Make;

class Annotation extends Make
{
    protected $type = "Annotation";

    protected function configure()
    {
        parent::configure();
        $this->setName('annotation:class')
            ->setDescription('Create a new annotation class');
    }

    protected function getStub(): string
    {
        return __DIR__ . DIRECTORY_SEPARATOR. 'stubs' . DIRECTORY_SEPARATOR . 'annotation.plain.stub';
    }

    protected function getNamespace(string $app): string
    {
        return parent::getNamespace($app) . '\\annotation';
    }
}