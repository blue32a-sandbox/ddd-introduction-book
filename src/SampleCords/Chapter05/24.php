<?php
// 煩雑な更新処理が定義されたリポジトリ（悪い例）
interface IUserRepocitory
{
    public function updateName(UserId $id, UserName $name): void;
    public function updateEmail(UserId $id, Email $mail): void;
    public function updateAddress(UserId $id, Address $address): void;

    // ...
}
