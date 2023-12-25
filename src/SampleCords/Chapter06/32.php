<?php
// ユーザ登録処理とユーザ退会処理
class UserApplicationService
{
    public function __construct(
        private readonly IUserRepository $userRepository,
        private readonly UserService $userService
    ) {
    }

    // ...

    public function register(UserRegisterCommand $command): void
    {
        $user = User::craete(
            new UserName($command->name)
        );

        if ($this->userService->exists($user)) {
            throw new CanNotRegisterUserException($user, 'ユーザは既に存在しています。');
        }

        $this->userRepository->save($user);
    }

    public function delete(UserDeleteCommand $command): void
    {
        $userId = new UserId($command->id);
        $user = $this->userRepository->find($userId);
        if ($user === null) {
            throw new UserNotFoundException($userId);
        }

        $this->userRepository->delete($user);
    }
}
