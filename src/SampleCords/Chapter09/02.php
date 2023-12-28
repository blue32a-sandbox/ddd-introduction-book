<?php
// 採番テーブルを利用するように変更
class User
{
    public static function create(UserName $name)
    {
        // データベースの接続設定からコネクションを作成して
        $dsn = 'mysql:host=ddd;dbname=ddddb';
        $pdo = new PDO($dsn, 'ddduser', 'dddpassword');

        // 採番テーブルを利用し採番処理を行っている
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
        return new self($id, $name);
    }

    public function __construct(
        private readonly UserId $id,
        private UserName $name
    ) {
    }

    // ...
}
