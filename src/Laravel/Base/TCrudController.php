<?php

namespace Ybzc\Laravel\Base;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

/**
 * issue 目前无法实现formRequest请求的功能
 * 现有思路为在Route注册时绑定请求对象
 * 目前的简单解决方案在路由里用中间件处理
 */
trait TCrudController
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view($this->webService()->tpl("index"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view($this->webService()->tpl("create"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NonRuleRequest $request
     * @return RedirectResponse
     */
    public function store(NonRuleRequest $request): RedirectResponse
    {
        try {
            $this->webService()->createRequest($request);
            Session::flash('success_message', '创建成功');
        } catch (\Exception $e) {
            Session::flash('failed_message', '创建失败'.$e->getMessage());
        }
        return Redirect::route($this->webService()->route("create"));
    }

    /**
     * Display the specified resource.
     *
     * @return Application|Factory|View
     */
    public function show(): View|Factory|Application
    {
        return view($this->webService()->tpl("show"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Application|Factory|View
     */
    public function edit(): View|Factory|Application
    {
        return view($this->webService()->tpl("edit"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NonRuleRequest $request
     * @return RedirectResponse
     */
    public function update(NonRuleRequest $request): RedirectResponse
    {
        try {
            $this->webService()->updateRequest($request);
            Session::flash('success_message', '更新成功');
        } catch (\Exception $e) {
            Session::flash('failed_message', '更新失败,'.$e->getMessage());
        }
        return Redirect::route($this->webService()->route("edit"), ['id' => $request->input('id')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse
    {
        $this->webService()->destroyRequest($request);
        return Redirect::route($this->webService()->route("index"));
    }

    /**
     * 抽象出一个WebService接口用于接口隔离
     * @return IWebService
     */
    protected abstract function webService(): IWebService;
}
