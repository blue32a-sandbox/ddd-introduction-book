<?php
// 外部公開するパラメータが追加されたときの変化
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

        // $userData = new UserData($user->id->value, $user->name->value);
        // コンストラクタの引数が増える
        $userData = new UserData($user->id->value, $user->name->value, $user->mailAddress->value);
        return $userData;
    }
}
