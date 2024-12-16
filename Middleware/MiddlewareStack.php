<?php

namespace Mascarade\Foundations\Core\Middleware;

class MiddlewareStack
{
    protected $middleware = [
        \Mascarade\Foundations\Core\Middleware\ClearSessionErrors::class,
    ];

    public function handle($request)
    {
        $pipeline = array_reduce(
            array_reverse($this->middleware),
            function ($stack, $middleware) {
                return function ($request) use ($stack, $middleware) {
                    return (new $middleware)->handle($request, $stack);
                };
            },
            function ($request) {
                return $request;
            }
        );

        return $pipeline($request);
    }
}
