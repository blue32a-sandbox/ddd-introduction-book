<?php
// テスト用のユニットオブワーク
class InMemoryUnitOfWork implements IUnitOfWork
{
    private ?InMemoryUserRepository $userRepository;

    public function userRepository(): IUserRepository
    {
        if (!isset($this->userRepository)) {
            $this->userRepository = new InMemoryUserRepository();
        }
        return $this->userRepository;
    }

    public function commit(): void
    {
        $this->userRepository?->commit();
    }
}
