<?php
// 外部から確認したときのクラスの定義
class UserApplicationService
{
    public function __construct($serviceLocator){/* ... */}
    public function register(UserRegisterCommand $command): void {/* ... */}
}
