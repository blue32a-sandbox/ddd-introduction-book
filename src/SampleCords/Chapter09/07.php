<?php
// インメモリで動作するファクトリ
class InMemoryUserFactory implements IUserFactory
{
    // 現在のID
    private int $currentId;

    public function create(UserName $name): User
    {
        // ユーザが生成されるたびにインクリメントする
        $this->currentId++;

        return new User(
            new UserId((string) $this->currentId),
            $name
        );
    }
}
