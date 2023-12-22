<?php
// ユーザを表すエンティティ
class User
{
    // はじめてインスタンスを生成する際に利用する
    public static function craete(UserName $name): self
    {
        $id = new UserId((string) uniqid('', true));
        return new self($id, $name);
    }

    // インスタンスを再構成する際に利用する
    public function __construct(
        private readonly UserId $id,
        private UserName $name
    ) {
    }

    public function getId(): UserId
    {
        return $this->id;
    }

    public function getName(): UserName
    {
        return $this->name;
    }

    public function changeName(UserName $name): void
    {
        $this->name = $name;
    }
}
