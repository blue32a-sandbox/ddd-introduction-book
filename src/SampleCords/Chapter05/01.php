<?php
// 第４章で登場したユーザ作成処理
class Program
{
    public function createUser(string $userName): void
    {
        $user = new User(new UserName($userName));

        $userService = new UserService();
        if ($userService->exists($user)) {
            throw new Exception(sprintf('%sは既に存在しています', $userName));
        }

        $dsn = 'mysql:host=ddd;dbname=ddddb';
        $pdo = new PDO($dsn, 'ddduser', 'dddpassword');
        $stmt = $pdo->prepare('INSERT INTO users (id, name) VALUES (:id, :name)');
        $stmt->execute([
            'id' => $user->id->value,
            'name' => $user->name->value,
        ]);
    }
}
