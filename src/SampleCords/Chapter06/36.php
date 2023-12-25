<?php
// クライアントはインターフェースを利用する
class Client
{
    public function __construct(
        private IUserRegisterService $userRegisterService
    ) {
    }

    // ...

    public function register(string $name): void
    {
        $command = new UserRegisterCommand($name);
        $this->userRegisterService->handle($command);
    }
}
