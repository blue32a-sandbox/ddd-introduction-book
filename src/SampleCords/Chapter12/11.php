<?php
// 通知のためのインターフェース
interface IUserNotification
{
    public function id(UserId $id): void;
    public function name(UserName $name): void;
}
