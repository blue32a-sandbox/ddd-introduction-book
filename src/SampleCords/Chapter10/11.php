<?php
// データの変更時にマーキングを行う
class User extends Entity
{
    public function __construct(private readonly UserName $name)
    {
        $this->markNew();
    }

    public function getName(): UserName
    {
        return $this->name;
    }

    public function changeName(UserName $name): void
    {
        $this->name = $name;
        $this->markDirty();
    }
}
