<?php
// ドメインオブジェクトを引数として受け取るコンストラクタを用意する
class UserData
{
    public readonly string $id;
    public readonly string $name;

    public function __construct(User $source)
    {
        $this->id = $source->id->value;
        $this->name = $source->name->value;
    }
}
