<?php
// SQLを利用したリポジトリ（saveメソッド）
class UserRepository implements IUserRepository
{
    public function __construct(
        private readonly string $dsn,
        private readonly string $user,
        private readonly string $password
    ) {
    }

    public function save(User $user): void
    {
        $pdo = new PDO($this->dsn, $this->user, $this->password);
        $stmt = $pdo->prepare("
INSERT INTO users (id, name)
VALUES (:id, :name)
ON DUPLICATE KEY UPDATE
  name = VALUES(name);
        ");
        $stmt->execute([
            'id' => $user->id->value,
            'name' => $user->name->value,
        ]);
    }

    // ...
}
