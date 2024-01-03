<?php
// サークル集約を通じてユーザ集約のふるまいを呼び出す
class Circle
{
    public function __construct(
        // ...
        private array $members
    ) {
    }

    // ...

    public function changeMemberName(UserId $id, UserName $name): void
    {
        $filterd = array_filter(
            $this->members,
            fn (User $user) => $user->id->equals($id));
        $target = count($filterd) === 1 ? array_shift($filterd) : null;
        if ($target !== null) {
            $target->changeName($name);
        }
    }
}
