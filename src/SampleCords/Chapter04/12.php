<?php
// ドメインサービスの実装
class UserService
{
    public function exists(User $user): bool
    {
        $dsn = 'mysql:host=ddd;dbname=ddddb';
        $pdo = new PDO($dsn, 'ddduser', 'dddpassword');
        $stmt = $pdo->prepare('SELECT * FROM users WHERE name = :name');
        $stmt->execute(['name' => $user->name->value]);
        return $stmt->fetch() !== false;
    }
}
