<?php
// 戻り値としてドメインオブジェクトを公開したユーザ情報取得メソッド
class UserApplicationService
{
    // ...

    public function get(string $userId): ?User
    {
        $targetId = new UserId($userId);
        $user = $this->userRepository->find($targetId);

        return $user;
    }
}
