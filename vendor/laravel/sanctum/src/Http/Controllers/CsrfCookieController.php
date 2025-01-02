<?php

namespace Laravel\Sanctum\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CsrfCookieController
{
    /**
     * Return an empty response simply to trigger the storage of the CSRF cookie in the browser.
     *
     * @param  \Illuminate\Http\Request  $request
<<<<<<< HEAD
     * @return \Illuminate\Http\Response
=======
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
>>>>>>> tundeseun/devtest
     */
    public function show(Request $request)
    {
        if ($request->expectsJson()) {
<<<<<<< HEAD
            return new JsonResponse(null, 204);
        }

        return new Response('', 204);
=======
            return new JsonResponse(status: 204);
        }

        return new Response(status: 204);
>>>>>>> tundeseun/devtest
    }
}
