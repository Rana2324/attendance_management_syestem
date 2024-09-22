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
                $token = auth()->user()->createToken( 'Token' )->plainTextToken;
                $data  = array_merge( auth()->user()->load( ['role'] )->toArray(), ['token' => $token] );

                return sendSuccessResponse( "Login Successfull", $data );
            } else {
                return sendErrorResponse( "Invalid Login Credentials", [], 403 );
            }

        } catch ( \Exception $ex ) {
            return sendErrorResponse( "Invalid Login Credentials" . $ex->getMessage() );
        }
    }
}
