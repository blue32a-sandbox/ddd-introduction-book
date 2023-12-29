<?php
// 再構築したインスタンス化どうかによって処理が分かれる
class UserRepository implements IUserRepository
{
    // findメソッドなどで再構築したインスタンスはクローンして保持しておく
    private array $cloned = [];

    // ...

    public function find(UserId $id): ?User
    {
        // ユーザを取得するコード

        // ...

        // 取得したユーザを保存
        $cloneInstance = $this->clone($user);
        $this->cloned[$user->id->value] = $cloneInstance;
        return $user;
    }

    private function clone(User $user): User
    {
        return new User($user->id, $user->name);
    }

    public function save(User $user): void
    {
        $recent = $this->cloned[$user->id->value] ?? null;

        if ($recent === null) {
            $this->saveUpdate($recent, $user);
        } else {
            $this->saveNew($user);
        }
    }

    private function saveNew(User $user): void
    {
        // UPSERT処理を行う
        // ...
    }

    private function saveUpdate(User $recent, User $latest): void
    {
        // 変化した項目に応じてUPDATE文を組み立てて実行
        // ...
    }
}
