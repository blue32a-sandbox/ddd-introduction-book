<?php
// インターフェースを実装したモックオブジェクト
class MockUserRegisterService implements IUserRegisterService
{
    public function handle(UserRegisterCommand $command): void
    {
        // nop
    }
}
