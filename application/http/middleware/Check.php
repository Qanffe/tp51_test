<?php

namespace app\http\middleware;

class Check
{
    public function handle($request, \Closure $next, $name)
    {
        echo '233';
        if($request->param('name') == 'Lee')
        {
            echo '是Le '. $name . '<br>';
        }

        return $next($request);
    }
}
