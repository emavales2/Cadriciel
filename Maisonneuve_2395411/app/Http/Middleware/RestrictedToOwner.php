<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
// use App\Models\User;

class RestrictedToOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    // public function handle(Request $request, Closure $next)
    public function handle($request, Closure $next) 

    // -------- * LEAVE DEAD CODE FOR NOW, WILL EXPERIMENT MORE LATER * --------
    // {
    //     // Verifier authentication et obtenir le user verifié
    //     if (auth()->check()) {

    //         $authenticatedUser = auth()->user();

    //         // ---- * DUMP AND DIE TESTS * ----
    //         dd($authenticatedUser, $request->user);
    //         // dd($authenticatedUser->id);
    //         // dd($request->user->id);
    //         // dd($request);
    //         // dd($request->user);

    //         // Check if the $authenticatedUser est le meme qui veut acceder à whatever
    //         if ($authenticatedUser->id === $request->user->id) {
    //             // Si oui, on continue
    //             return $next($request);
    //         }
    //     }

    //     // Si non
    //     return redirect('/dashboard')->with('error', 'Unauthorized access.');
    // }


    // ---------


    {
        // Verifier authentication et obtenir le user verifié
        if (auth()->check()) {

            $authenticatedUser = auth()->user();
    
            // ---- * DUMP AND DIE TESTS * ----
            // dd($authenticatedUser, $request->user);
            // dd($authenticatedUser->id);
            // dd($request->user->id);
            // dd($request);
            // dd($request->user);

            return $next($request);
        }

        // Si non
        return redirect('/dashboard')->with('error', 'Unauthorized access.');
    }
}