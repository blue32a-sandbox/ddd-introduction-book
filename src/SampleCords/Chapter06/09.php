<?php
// ドメインオブジェクトからDTOへのデータ移し替え処理
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

        $userData = new UserData($user->id->value, $user->name->value);
        return $userData;
    }
}
