<?php
// ドメインオブジェクトのメソッドの意図せぬ呼び出し
class Client
{
    public function __construct(
        private readonly UserApplicationService $userApplicationService
    ) {
    }

    // ...

    public function changeName(string $id, string $name): void
    {
        $target = $this->userApplicationService->get($id);
        $newName = new UserName($name);
        $target->changeName($newName);
    }
}
