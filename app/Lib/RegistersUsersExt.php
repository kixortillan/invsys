<?php

namespace App\Lib;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

trait RegistersUsersExt
{

    /**
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return $this->registered($request, $user) ?:
                redirect($this->redirectPath())
                        ->with(['message' => 'Congratulations! We have sent an email to verify your account.']);
    }

}
