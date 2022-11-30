<?php

namespace Ybzc\Laravel\Base\Impl;

trait TRouteViewRuleDefiner
{
    private array $createRule = [];
    private array $updateRule = [];
    private array $tpl = [];
    private array $route = [];

    public function defineRoute(array &$route): void
    {
        $route = [...$route, ...$this->route];
    }

    public function defineView(array &$view): void
    {
        $view = [...$view, ...$this->tpl];
    }

    public function defineCreateRule(array &$createRule): void
    {
        $createRule = [...$createRule, ...$this->createRule];
    }

    public function defineUpdateRule(array &$updateRule): void
    {
        $updateRule = [...$updateRule, ...$this->updateRule];
    }
}
