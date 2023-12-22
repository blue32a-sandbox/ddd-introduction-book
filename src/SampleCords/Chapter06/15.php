<?php
// ユーザ名の変更を行う更新処理
class UserApplicationService
{
    public function __construct(
        private readonly IUserRepository $userRepository,
        private readonly UserService $userService
    ) {
    }

    // ...

    public function update(string $userId, string $name): void
    {
        $targetId = new UserId($userId);
        $user = $this->userRepository->find($targetId);

        if ($user === null) {
            throw new UserNotFoundException($targetId);
        }

        $newUserName = new UserName($name);
        $user->changeName($newUserName);
        if ($this->userService->exists($user)) {
            throw new CanNotRegisterUserException($user, 'ユーザは既に存在しています。');
        }

        $this->userRepository->save($user);
    }
}
