<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Auth\LogoutRequest;
use App\Http\Resources\Api\V1\Auth\Logout\LoggedOutResource;
use App\Repositories\AuthRepository;

class LogoutController extends Controller
{
    public function logout(
        LogoutRequest $request,
        AuthRepository $authRepository
    ): LoggedOutResource {
        $user = $request->user();
        $authRepository->logout($user);

        return new LoggedOutResource($user);
    }
}
