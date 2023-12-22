<?php
// コマンドオブジェクトの例
class UserUpdateCommand
{
    public string $name;
    public string $mailAddress;

    public function __construct(public readonly string $id)
    {
    }
}

// 次のようにコンストラクタで名前やメールアドレスが任意であることを主張させてもよい
class UserUpdateCommand
{
    public function __construct(
        public readonly string $id,
        public readonly ?string $name = null,
        public readonly ?string $mailAddress = null
    ) {
    }
}
