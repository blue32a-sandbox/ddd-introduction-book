<?php
// 連想配列をベースとしたリポジトリ
class InMemoryUserRepository implements IUserRepository
{
    /** @var array<string, User> */
    public readonly array $store;

    public function find(UserName $userName): ?User
    {
        $filterd = array_filter($this->store, fn($user) => $user->name->equals($userName));
        $target = array_shift($filterd);
        if ($target !== null) {
            return $this->clone($target);
        } else {
            return null;
        }
    }

    public function save(User $user): void
    {
        $this->store[$user->id->value] = $this->clone($user);
    }

    private function clone(User $user): User
    {
        return new User($user->id, $user->name);
    }
}
