<?php
// ユーザが見つからない場合は退会成功とする
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
            // 対象が見つからなかったため退会成功とする
            return;
        }

        $this->userRepository->delete($user);
    }
}
