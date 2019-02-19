<?php

namespace App\Http\Middleware;

use Closure;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // lay tham so ma nguoi dung gui len
        $age = $request->age;
        if ($age > 20) {
            # code...
            return $next($request); // cho phep di tiep
        }
        else {
            // chuyen huong toi trang do-not-watch-film
            return redirect()->route('cancleFilm');
        }
    }
}
