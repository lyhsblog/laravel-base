<?php

namespace Ybzc\Laravel\Base;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

interface IWebService extends ICrudService
{
    public function tpl(string $key): string;
    public function route(string $key): string;
    public function createRule(): array;
    public function updateRule(): array;
    public function updateRequest(FormRequest $request): Model;
    public function createRequest(FormRequest $request): Model;
    public function destroyRequest(Request $request):void;
}
