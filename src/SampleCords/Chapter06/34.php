<?php
// ユーザ退会処理クラス
class UserDeleteService
{
    public function __construct(
        private readonly UserService $userService
    ) {
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
