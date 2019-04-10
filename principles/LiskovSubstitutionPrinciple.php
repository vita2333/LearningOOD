<?php
/**
 * Author: vita2333
 * Date: 2019/4/10
 */

/**
 * 里氏替换原则（Liskov Substitution Principle）
 * 定义
 *
 * In a computer program, if S is a subtype of T, then objects of type T may be
 * replaced with objects of type S (i.e. an object of type T may be substituted
 * with any object of a subtype S) without altering any of the desirable
 * properties of the program (correctness, task performed, etc.)
 *
 * 即：所有引用基类的地方必须能透明地使用其子类的对象，也就是说子类对象可以替换其父类对象，而程序执行效果不变。
 *
 * 里氏替换原则是对继承关系的一种检验：检验是否真正符合继承关系，以避免继承的滥用。因此，在使用继承之前，需要反复思考和确认该继承关系是否正确，或者当前的继承体系是否还可以支持后续的需求变更，如果无法支持，则需要及时重构，采用更好的方式来设计程序。
 */
class LiskovSubstitutionPrinciple
{

}

/**
 * 需求点
 * 创建两个类：长方形和正方形，都可以设置宽高（边长），也可以输出面积大小
 */
class BadRectangle
{

    protected $_width;
    protected $_height;


    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->_width;
    }

    /**
     * @param mixed $width
     */
    public function setWidth($width)
    {
        $this->_width = $width;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->_height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height)
    {
        $this->_height = $height;
    }

    public function getArea()
    {
        return $this->_width * $this->_height;
    }

}

class BadSquare extends BadRectangle
{

    public function setWidth($width)
    {
        $this->_width  = $width;
        $this->_height = $width;
    }

    public function setHeight($height)
    {
        $this->_width  = $height;
        $this->_height = $height;
    }
}

/**
 * 正方形类继承了长方形类以后，为了保证边长永远是相等的，特意在两个set方法里面强制将宽和高都设置为传入的值，也就是重写了父类Rectangle的两个set方法。但是里氏替换原则里规定，子类不能重写父类的方法，所以上面的设计是违反该原则的。
 */
abstract class GoodQuadrangle
{

    protected $_width;
    protected $_height;

    abstract public function setWidth($width);

    abstract public function getWidth($width);

    abstract public function setHeight($height);

    abstract public function getHeight($height);

    abstract public function getArea();
}

class GoodRectangle extends GoodQuadrangle
{

    public function setWidth($width)
    {
        $this->_width = $width;
    }

    public function getWidth($width)
    {
        return $this->_width;
    }

    public function setHeight($height)
    {
        $this->_height = $height;
    }

    public function getHeight($height)
    {
        return $this->_height;
    }

    public function getArea()
    {
        return $this->_width * $this->_height;
    }
}

class GoodSquare extends GoodQuadrangle
{

    protected $_sideLength;

    /**
     * @param mixed $sideLength
     */
    public function setSideLength($sideLength)
    {
        $this->_sideLength = $sideLength;
    }

    public function setWidth($width)
    {
        $this->_sideLength = $width;
    }

    public function setHeight($height)
    {
        $this->_sideLength = $height;
    }

    public function getArea()
    {
        return $this->_sideLength * $this->_sideLength;
    }

    public function getWidth($width)
    {
        return $this->_sideLength;
    }

    public function getHeight($height)
    {
        return $this->_sideLength;
    }
}


