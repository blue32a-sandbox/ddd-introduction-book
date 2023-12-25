<?php
// モックオブジェクトに例外を送出させる
class ExceptionUserRegisterService implements IUserRegisterService
{
    public function handle(UserRegisterCommand $command): void
    {
        throw new Exception();
    }
}
