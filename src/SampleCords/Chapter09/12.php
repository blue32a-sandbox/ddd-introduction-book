<?php
// 採番処理と永続化で利用される技術が異なる
class UserRepository implements IUserRepository
{
    public function __construct(private readonly NumberingApi $numberingApi)
    {
    }

    // ...

    // リレーショナルデータベースを利用しているが
    public function find(UserName $userName): ?User
    {
        $dsn = 'mysql:host=ddd;dbname=ddddb';
        $pdo = new PDO($dsn, 'ddduser', 'dddpassword');
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

    // 採番処理はリレーショナルデータベースを利用していない
    public function nextIdentity(): UserId
    {
        $response = $this->numberingApi->request();
        return new UserId($response->nextId);
    }
}
