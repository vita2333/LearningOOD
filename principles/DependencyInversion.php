<?php
/**
 * Author: vita2333
 * Date: 2019/4/6
 */

/**
 * 依赖倒置原则（Dependency Inversion Principle）
 *
 * 定义
 * Depend upon Abstractions. Do not depend upon concretions.
 * 针对接口编程，而不是针对实现编程。
 * Abstractions should not depend upon details. Details should depend upon
 * 尽量不要从具体的类派生，而是以继承抽象类或实现接口来实现。
 * abstractions. High-level modules should not depend on low-level modules.
 * Both should depend on abstractions.
 * 关于高层模块与低层模块的划分可以按照决策能力的高低进行划分。业务层自然就处于上层模块，逻辑层和数据层自然就归类为底层。
 */
class DIP
{

}

/**
 * 需求点
 * 实现下面这样的需求：
 *
 * 用代码模拟一个实际项目开发的场景：前端和后端开发人员开发同一个项目。
 */

/**
 * 不好的例子
 * 高层模块（Project）依赖了低层模块（BackEndDeveloper）的改动，因此上述设计不符合依赖倒置原则。
 */
class BadFrontendDeveloper
{

    public function writeJsCode()
    {
    }
}

class BadBackendDeveloper
{

    public function writePhpCode()
    {
    }
}

class BadProject
{

    private $_developers;

    public function initWithDevelopers($developers)
    {
        $this->_developers = $developers;
    }

    public function startDeveloping()
    {
        foreach ($this->_developers as $developer) {
            if ($developer instanceof BadFrontendDeveloper) {
                $developer->writeJsCode();
            } elseif ($developer instanceof BadBackendDeveloper) {
                $developer->writePhpCode();
            } else {
                echo 'unknown developer';
            }
        }
    }
}

/**
 * 较好的设计
 */
interface DeveloperProtocol
{

    public function writeCode();
}

class FrontendDeveloper implements DeveloperProtocol
{

    public function writeCode()
    {
        // TODO: Implement writeCode() method.
    }
}

class BackendDeveloper implements DeveloperProtocol
{

    public function writeCode()
    {
        // TODO: Implement writeCode() method.
    }
}

class Project
{


    private $_developers;

    public function initWithDevelopers($developers)
    {
        $this->_developers = $developers;
    }

    public function startDevelop()
    {
        /** @var \DeveloperProtocol $developer */
        foreach ($this->_developers as $developer) {
            $developer->writeCode();
        }
    }

}