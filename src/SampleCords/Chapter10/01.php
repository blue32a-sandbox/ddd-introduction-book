<?php
// ユーザ登録処理のコード
class UserApplicationService
{
    public function __construct(
        private readonly IUserFactory $userFactory,
        private readonly IUserRepository $userRepository,
        private readonly UserService $userService
    ) {
    }

    // ...

    public function register(UserRegisterCommand $command): void
    {
        $userName = new UserName($command->name);
        $user = $this->userFactory->create($userName);

        if ($this->userService->exists($user)) {
            throw new CanNotRegisterUserException($user, 'ユーザは既に存在しています。');
        }

        $this->userRepository->save($user);
    }
}
