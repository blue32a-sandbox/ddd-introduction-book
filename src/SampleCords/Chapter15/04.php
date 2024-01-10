<?php
// ユーザのエンティティを日本語で記述する
class ユーザ
{
    public function __construct(
        private ユーザ名 $name
    ) {
    }

    public function 名前を変更する(ユーザ名 $name): void
    {
        $this->name = $name;
    }
}
