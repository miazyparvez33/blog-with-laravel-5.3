<?php

namespace App\Http\Middleware;

use Closure;

class isBoth
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
        //return $next($request);

          // $user = $request->user();



          //  if($user->role->name == "Administrator"){

          //       return $next($request);
          //   }

          //     return redirect('/');

        // $user = $request->user();



        //    if($user->role->name == "Admin" || $user->role->name == "Author"){

        //         return $next($request);
        //     }

        //       return redirect('/');


        $user = $request->user();



           if($user->role->name == "Administrator"){

                return $next($request);
            }

            elseif ($user->role->name == "Author") {
                
                 return $next($request);
            }

              return redirect('/');



    }
}
