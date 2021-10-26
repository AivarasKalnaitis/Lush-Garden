<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\Token;
use Lcobucci\JWT\Parser;

/**
 * Class LoginController
 * @package App\Http\Controllers\API\Auth
 */
class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * LoginController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest:api')->except('logout');
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response|RedirectResponse
     */
    protected function sendLoginResponse(Request $request)
    {
        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect()->intended($this->redirectPath());
    }

    /**
     * The user has been authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @param Authenticatable|User $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        $personalAccessToken = $user->createToken('Grant Client');

        return new Response([
            'token' => $personalAccessToken->accessToken,
            'token_type' => 'Bearer',
        ], JsonResponse::HTTP_ACCEPTED);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('api');
    }

    /**
     * @param Request $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        $user = User::query()->where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $this->guard()->setUser($user);

                return true;
            }
        }

        return false;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function logout(Request $request)
    {
        $value = $request->bearerToken();
        $tokenId = (new Parser())->parse($value)->getClaim('jti');

        /** @var User $customer */
        $customer = auth('api')->user();

        /** @var Token $token */
        $token = $customer->tokens->find($tokenId);
        $token->revoke();

        return new Response('', JsonResponse::HTTP_NO_CONTENT);
    }
}
