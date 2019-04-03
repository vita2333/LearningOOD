<?php
    /**
     * Author: vita2333
     * Date: 2019/4/3
     */

    /**
     * 开闭原则——对扩展开放，对修改关闭
     *
     * 1.定义
     * Software entities (classes, modules, functions, etc.) should be open for extension, but closed for modification.
     * 即：一个软件实体如类、模块和函数应该对扩展开放，对修改关闭。
     *
     * 2.定义的解读
     * 1) 用抽象构建框架，用实现扩展细节。
     * 2) 不以改动原有类的方式来实现新需求，而是应该以实现事先抽象出来的接口（或具体类继承抽象类）的方式来实现。
     *
     * 3.优点
     * 实践开闭原则的优点在于可以在不改动原有代码的前提下给程序扩展功能。增加了程序的可扩展性，同时也降低了程序的维护成本。
     *
     */
    class OCP {

    }

    /**
     * 例子一：一个在线课程类
     *
     * 原本只有类似于博客的，通过文字讲解的课程。
     * 需要增加视频课程，音频课程以 及直播课程。
     */

    /**
     * 不好的设计,直接在course类中增加新需求，导致之前的类实例多出了不属于自己的数据
     */
    class BadCourse {
        /**
         * 原本课程数据
         */
        public $title;
        public $introduction;
        public $teacherName;
        public $content;

        /**
         * 新的需求
         */
        public $videoUrl;
        public $audioUrl;
        public $liveUrl;
    }

    /**
     * 好的设计
     */
    abstract class GoodCourse {
        public $title;
        public $introduction;
        public $teacherName;
    }

    class TextCourse extends GoodCourse {
        public $content;
    }

    class VideoCourse extends GoodCourse {
        public $videoUrl;
    }

    class AudioCourse extends GoodCourse {
        public $auditUrl;
    }