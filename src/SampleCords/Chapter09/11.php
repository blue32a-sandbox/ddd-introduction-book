<?php
// 採番処理を利用してユーザを登録する
class UserApplicationService
{
    public function __construct(
        private IUserRepository $userRepository
    ) {
    }

    public function register(UserRegisterCommand $command): void
    {
        $userName = new UserName($command->name);
        $user = new User(
            $this->userRepository->nextIdentity(),
            $userName
        );

        // ...
    }
}
