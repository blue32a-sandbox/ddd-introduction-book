<?php
// インメモリのリポジトリでコミットなどが行えるようにする
class InMemoryUserRepository implements IUserRepository
{
    private readonly array $creates;
    private readonly array $updates;
    private readonly array $deletes;
    private array $db;

    public function __construct()
    {
        $this->creates = [];
        $this->updates = [];
        $this->deletes = [];
        $this->db = [];
    }

    private function getData(): array
    {
        $data = $this->db;

        foreach ($this->deletes as $key => $value) {
            unset($data[$key]);
        }

        foreach ($this->creates as $key => $value) {
            $data[$key] = $value;
        }

        foreach ($this->updates as $key => $value) {
            $data[$key] = $value;
        }

        return $data;
    }

    public function save(User $user): void
    {
        $rawUserId = $user->id->value;
        $targetMap = array_key_exists($rawUserId, $this->getData()) ? $this->updates : $this->creates;
        $targetMap[$rawUserId] = $this->clone($user);
    }

    public function remove($user)
    {
        $this->deletes[$user->name->value] = $this->clone($user);
    }

    public function commit()
    {
        $this->db = $this->getData();
        $this->creates = [];
        $this->updates = [];
        $this->deletes = [];
    }

    // ...
}
