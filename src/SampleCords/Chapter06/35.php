<?php
// ユーザ登録処理のインターフェース
interface IUserRegisterService
{
    public function handle(UserRegisterCommand $command): void;
}
