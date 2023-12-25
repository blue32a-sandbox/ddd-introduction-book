<?php
// ユーザ登録処理クラス
class UserRegisterService
{
    public function __construct(
        private readonly IUserRepository $userRepository,
        private readonly UserService $userService
    ) {
    }

    public function handle(UserRegisterCommand $command): void
    {
        $userName = new UserName($command->name);
        $user = User::craete($userName);

        if ($this->userService->exists($user)) {
            throw new CanNotRegisterUserException($user, 'ユーザは既に存在しています。');
        }

        $this->userRepository->save($user);
    }
}
