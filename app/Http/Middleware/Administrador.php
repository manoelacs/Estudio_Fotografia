<?php


namespace App\Http\Middleware;


use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Administrador extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function administrador()
    {
        // Get the currently authenticated user...
       $user = Auth::user();

        // Get the currently authenticated user's ID...
        $id = Auth::id();
        if (!($user->role_id == 1)) {

        }
    }

}
