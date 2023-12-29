<?php
// リポジトリに変更の追跡を移譲したユニットオブワーク
class UnitOfWork implements IUnitOfWork
{
    private ?UserRepository $userRepository;

    public function __construct(private readonly PDO $pdo)
    {
    }

    public function userRepository(): IUserRepository
    {
        if (!isset($this->userRepository)) {
            $this->userRepository = new UserRepository($this->pdo);
        }
        return $this->userRepository;
    }

    public function commit(): void
    {
        $this->pdo->commit();
    }
}
