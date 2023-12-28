<?php
// シーケンスを利用したファクトリ
class UserFactory implements IUserFactory
{
    public function create(UserName $name): User
    {
        $dsn = 'mysql:host=ddd;dbname=ddddb';
        $pdo = new PDO($dsn, 'ddduser', 'dddpassword');
        $pdo->beginTransaction();
        try {

            $stmt = $pdo->prepare('UPDATE UserSeq SET id = LAST_INSERT_ID(id + 1)');
            $stmt->execute();
            $stmt = $pdo->prepare('SELECT LAST_INSERT_ID()');
            $stmt->execute();
            $seqId = $stmt->fetchColumn();
        } catch (Throwable $e) {
            $pdo->rollBack();
            throw $e;
        }

        $id = new UserId($seqId);
        return new User($id, $name);
    }
}
