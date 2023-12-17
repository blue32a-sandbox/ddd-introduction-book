<?php
// 重複確認のふるまいをUserクラスに追加
class User
{
    public function __construct(
        private readonly UserId $id,
        private UserName $name
    ) {
    }

    /**
     * 追加した重複確認のふるまい
     */
    public function exists(User $user): bool
    {
        // 重複を確認するコード
        // ...
    }
}
