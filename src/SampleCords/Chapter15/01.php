<?php
// ユーザを登場する処理はいずこに
class UserApplicationService
{
    public function saveNew(UserSaveNewCommand $command): void {}
    public function update(UserUpdateCommand $command): void {}
    public function remove(UserRemoveCommand $command): void {}
}
