<?php
// SQLを利用したリポジトリ（findメソッド）
class UserRepository implements IUserRepository
{
    public function __construct(
        private readonly string $dsn,
        private readonly string $user,
        private readonly string $password
    ) {
    }

    // ...

    public function find(UserName $userName): ?User
    {
        $pdo = new PDO($this->dsn, $this->user, $this->password);
        $stmt = $pdo->prepare("SELECT * FROM users WHERE name = :name");
        $stmt->execute([
            'name' => $userName->value,
        ]);
        $result = $stmt->fetch();
        if ($result !== null) {
            return new User(
                new UserId($result['id']),
                new UserName($result['name'])
            );
        } else {
            return null;
        }
    }
}
