<?php
// 変更箇所はUserDataクラスにまとめられる
class UserData
{
    public readonly string $id;
    public readonly string $name;
    public readonly string $mailAddress; // 追加された属性

    public function __construct(User $source)
    {
        $this->id = $source->id->value;
        $this->name = $source->name->value;
        $this->mailAddress = $source->mailAddress->value; // 属性への代入処理
    }
}
