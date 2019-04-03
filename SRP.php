<?php
    /**
     * Author: vita2333
     * Date: 2019/4/3
     */

    /**
     * 单一职责原则
     *
     * 1.定义
     *
     * A class should have a single responsibility, where a responsibility is nothing but a reason to change.
     * 即：一个类只允许有一个职责，即只有一个导致该类变更的原因。
     *
     * 2.定义的解读
     *
     * 如果一个类具有多种职责，就会有多种导致经常需要变动，从而导致这个类的维护变得困难。
     * 往往在软件开发中随着需求的不断增加，可能会给原来的类添加一些本来不属于它的一些职责，从而违反了单一职责原则。
     * 如果我们发现当前类的职责不仅仅有一个，就应该将本来不属于该类真正的职责分离出去。
     * 不仅仅是类，函数（方法）也要遵循单一职责原则，即：一个函数（方法）只做一件事情。
     *
     * 3.优点
     *
     * 如果类与方法的职责划分得很清晰，不但可以提高代码的可读性，更实际性地更降低了程序出错的风险，因为清晰的代码会让bug无处藏身，也有利于bug的追踪，也就是降低了程序的维护成本。
     */
    class SRP {

    }

    /**
     * 需求点
     * 初始需求：需要创造一个员工类，这个类有员工的一些基本信息。
     *
     * 新需求：增加两个方法：
     *
     * 判定员工在今年是否升职
     * 计算员工的薪水
     */
    class BadEmployee {
        public $name;
        public $address;
        public $employeeId;

        /**
         * 新需求
         */
        public function calculateSalary() {
        }

        public function willGetPromotionThisYear() {
        }
    }

    class GoodEmployee {
        public $name;
        public $address;
        public $employeeId;

    }

    /**
     * 会计部门
     */
    class FinancialApartment {
        public function calculateSalary(GoodEmployee $employee) {
        }
    }

    /**
     * 人事部门
     */
    class HRApartment {
        public function willGetPromotionThisYear(GoodEmployee $employee) {
        }
    }
