<?php

namespace Ybzc\Laravel\Base;

interface IRouteViewRuleDefiner
{
    public function defineRoute(array &$route):void;
    public function defineView(array &$view):void;
    public function defineCreateRule(array &$createRule):void;
    public function defineUpdateRule(array &$updateRule):void;
}
