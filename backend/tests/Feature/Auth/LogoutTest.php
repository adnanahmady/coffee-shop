<?php

namespace Tests\Feature\Auth;

use App\Http\Controllers\Api\V1\Auth\LogoutController;
use App\Http\Resources\Api\V1\Auth\Logout;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\TestResponse;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\CoversFunction;
use Tests\TestCase;
use Tests\Traits\LetsBeTrait;

#[CoversClass(LogoutController::class)]
#[CoversFunction('logout')]
class LogoutTest extends TestCase
{
    use RefreshDatabase;
    use LetsBeTrait;

    public function test_response_data_should_be_in_expected_form(): void
    {
        $this->withoutExceptionHandling();
        $this->letsBe($user = createUser());

        $response = $this->request()->json();

        $this->assertSame([
            Logout\LoggedOutResource::DATA => 'You\'r logged out from system',
            Logout\LoggedOutResource::META => [
                Logout\UserResource::ID => $user->getId(),
                Logout\UserResource::NAME => $user->getName()->getFullName(),
            ],
        ], $response);
    }

    public function test_it_response_with_proper_status(): void
    {
        $this->withoutExceptionHandling();
        $this->letsBe(createUser());

        $response = $this->request();

        $response->assertOk();
    }

    private function request(string $token = null): TestResponse
    {
        $self = $this;

        if ($token) {
            $self = $this->withToken($token);
        }

        return $self->postJson(
            uri: route(name: 'api.v1.logout'),
        );
    }
}
