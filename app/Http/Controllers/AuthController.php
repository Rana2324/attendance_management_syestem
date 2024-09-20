<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    public function login( Request $request )
    {
        try {
            $credentials = $request->only( 'email', 'password' );

            if ( Auth::attempt( $credentials ) ) {

                return sendSuccessResponse( "Login Successfull", auth()->user()->load( ['role'] ) );
            } else {
                return sendErrorResponse( "Invalid Login Credentials", [], 403 );
            }

        } catch ( \Exception $ex ) {
            return sendErrorResponse( "Invalid Login Credentials" . $ex->getMessage() );
        }
    }
}
