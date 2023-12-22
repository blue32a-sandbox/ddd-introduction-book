<?php
// 退会処理
class UserApplicationService
{
    public function __construct(
        private readonly IUserRepository $userRepository
    ) {
    }

    // ...

    public function delete(UserDeleteCommand $command): void
    {
        $targetId = new UserId($command->id);
        $user = $this->userRepository->find($targetId);

        if ($user === null) {
            throw new UserNotFoundException($targetId);
        }

        $this->userRepository->delete($user);
    }
}
