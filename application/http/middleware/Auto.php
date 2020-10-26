<?php

namespace app\http\middleware;

class Auto
{
    public function handle($request, \Closure $next, $name)
    {
        if($request->param('id') == '10')
        {
            echo '管理员name:'. $name. '<br>';
        }

        return $next($request);
    }
}
