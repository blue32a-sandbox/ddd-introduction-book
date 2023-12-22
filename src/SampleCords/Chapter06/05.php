<?php
// ユーザ登録処理の実装
class UserApplicationService
{
    public function __construct(
        private readonly IUserRepository $userRepository,
        private readonly UserService $userService
    ) {
    }

    public function register(string $name): void
    {
        $user = User::craete(new UserName($name));

        if ($this->userService->exsits($user)) {
            throw new CanNotRegisterUserException($user, 'ユーザは既に存在しています。');
        }

        $this->userRepository->save($user);
    }
}
