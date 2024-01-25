<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

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
    // {
    //     // Verifier authentication et obtenir le user verifié
    //     if (auth()->check()) {

    //         $authenticatedUser = auth()->user();
    //         // dd($authenticatedUser, $request->user);

    //         // Check if the $authenticatedUser est le meme qui veut acceder à whatever
    //         if ($authenticatedUser->id === $request->user->id) {
    //             // Si oui, on continue
    //             return $next($request);
    //         }
    //     }

    //     // Si non
    //     return redirect('/dashboard')->with('error', 'Unauthorized access.');
    // }

   
    {
        // Verify authentication and get the authenticated user
        $authenticatedUser = auth()->user();

        // Check if the $authenticatedUser is the same as the one trying to access something
        if ($authenticatedUser && $authenticatedUser->id === $request->route('etudiant')->id) {
            // If yes, continue
            return $next($request);
        }

        // If not, check for Article model
        if ($authenticatedUser && $authenticatedUser->id === $request->route('article')->user_id) {
            // If yes, continue
            return $next($request);
        }

        // If not, redirect or handle unauthorized access
        return redirect('/dashboard')->with('error', 'Unauthorized access.');
    }
}