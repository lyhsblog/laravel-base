<?php

namespace Ybzc\Laravel\Base\Impl;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

trait TWebService
{
    use TCrudService;
    protected array $createRule = [];
    protected array $updateRule = [];
    protected array $tpl = [];
    protected array $route = [];

    /**
     * 获取路由
     * @throws \Exception
     */
    public function route(string $key):string {
        if(!array_key_exists($key, $this->route)) {
            throw new \Exception('view is not exists');
        }
        return $this->route[$key];
    }

    /**
     * 获取模板
     * @throws \Exception
     */
    public function tpl(string $key): string {
        if(!array_key_exists($key, $this->tpl)) {
            throw new \Exception('view is not exists');
        }
        return $this->tpl[$key];
    }
    public function createRule(): array {
        return $this->createRule;
    }
    public function updateRule(): array {
        return $this->updateRule;
    }
    public function updateRequest(FormRequest $request): Model {
        return $this->update($request->validated());
    }
    public function createRequest(FormRequest $request): Model {
        return $this->create($request->validated());
    }

    public function destroyRequest(Request $request): void {
        $this->destroy($request->input('ids'));
    }
}
