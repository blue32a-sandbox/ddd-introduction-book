<?php
// サークル集約越しに操作されたユーザ集約に対する変更をサポートする
class CircleRepository implements ICircleRepository
{
    // ...

    public function save(Circle $circle): void
    {
        // ユーザ集約に対する更新処理を行う
        $stmt = $this->pdo->prepare("
UPDATE users SET username = @username WHERE id = @id;
        ");
        foreach ($this->members as $user) {
            $stmt->execute([
                'id' => $user->id->value,
                'username' => $user->name->value,
            ]);
        }

        // その後サークルの更新処理を行う
        // ...
    }
}
