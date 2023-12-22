<?php
// リスト6.13を利用したユーザ情報取得処理
class UserApplicationService
{
    public function __construct(
        private readonly IUserRepository $userRepository
    ) {
    }

    // ...

    public function get(string $userId): UserData
    {
        $targetId = new UserId($userId);
        $user = $this->userRepository->find($targetId);

        if ($user === null) {
            return null;
        }

        return new UserData($user);
    }
}
