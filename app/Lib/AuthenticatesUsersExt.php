<?php

namespace App\Lib;

use Illuminate\Http\Request;

trait AuthenticatesUsersExt
{

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|user-verified', 'password' => 'required',
        ]);
    }

}