<?php
/**
 * Author: vita2333
 * Date: 2019/4/6
 */

/**
 * 接口分离原则（Interface Segregation Principle）
 *
 * Many client specific interfaces are better than one general purpose
 * interface.
 * 即：多个特定的客户端接口要好于一个通用性的总接口。
 */
class ISP
{

}

/**
 * 需求点
 * 写一些接口方法来涵盖餐厅的所有的下单及支付功能。
 */
interface BadRestaurantProtocol
{

    public function createOnlineOrder();

    public function createTelephoneOrder();

    public function payOnline();

    public function payOffline();

}

class BadOnlineCreateAndOnlinePayClient implements BadRestaurantProtocol
{

    public function createOnlineOrder()
    {
        // TODO: Implement createOnlineOrder() method.
    }

    public function createTelephoneOrder()
    {
        //no need
    }

    public function payOnline()
    {
        // TODO: Implement payOnline() method.
    }

    public function payOffline()
    {
        // no need
    }
}

class BadTelephoneCreateAndOnlinePayClient implements BadRestaurantProtocol
{

    public function createOnlineOrder()
    {
        // no need
    }

    public function createTelephoneOrder()
    {
        // TODO: Implement createTelephoneOrder() method.
    }

    public function payOnline()
    {
        // TODO: Implement payOnline() method.
    }

    public function payOffline()
    {
        // no need
    }

}

interface GoodRestaurantCreateOrderProtocol
{

    public function createOrder();
}

interface GoodRestaurantPayProtocol
{

    public function payOrder();
}

interface GoodClientProtocol extends GoodRestaurantCreateOrderProtocol, GoodRestaurantPayProtocol
{

}

class GoodOnlineClient implements GoodClientProtocol
{

    public function createOrder()
    {
        // TODO: Implement createOrder() method.
    }

    public function payOrder()
    {
        // TODO: Implement payOrder() method.
    }
}

class GoodTelephoneClient implements GoodClientProtocol
{

    public function createOrder()
    {
        // TODO: Implement createOrder() method.
    }

    public function payOrder()
    {
        // TODO: Implement payOrder() method.
    }

}