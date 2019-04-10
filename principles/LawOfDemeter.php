<?php
/**
 * Author: vita2333
 * Date: 2019/4/10
 */

/**
 * 迪米特法则（Law of Demeter）
 * 定义
 * You only ask for objects which you directly need.
 *
 * 即：一个对象应该对尽可能少的对象有接触，也就是只接触那些真正需要接触的对象。
 */
class LawOfDemeter
{

}

/**
 * 需求点
 * 设计一个汽车类，包含汽车的品牌名称，引擎等成员变量。
 * 提供一个方法返回引擎的品牌名称。
 */
class BadCar
{

    /**
     * @var \Engine
     */
    private $_engine;

    public function __construct($engine)
    {
        $this->_engine = $engine;
    }

    public function getEngine()
    {
        return $this->_engine;
    }
}

class Engine
{

    public $brandName;
}

class BadUse
{

    public function getEngineName(BadCar $car)
    {
        $engine = $car->getEngine(); //引入了和入参（Car）和返回值（brandName）无关的GasEngine对象

        return $engine->brandName;
    }
}

class GoodCar
{

    private $_engine;

    public function __construct(Engine $engine)
    {
        $this->_engine = $engine;
    }

    public function getEngineBrandName()
    {
        return $this->_engine->brandName;
    }

}

class GoodUse
{

    public function getBrandName(GoodCar $car)
    {
        return $car->getEngineBrandName();//直接获取到了引擎的品牌名称
    }
}
/**
 * 这样设计的好处是，如果这辆车的引擎换成了电动引擎(原来的GasEngine类换成了ElectricEngine类)，客户端代码可以不做任何修改！因为它没有引入任何引擎类，而是直接获取了引擎的品牌名称。
 */