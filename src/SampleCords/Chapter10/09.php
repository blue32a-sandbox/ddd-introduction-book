<?php
// ユニットオブワークの定義
class UnitOfWork
{
    public function registerNew(object $value): void {}
    public function registerDirty(object $value): void {}
    public function registerClean(object $value): void {}
    public function registerDeleted(object $value): void {}
    public function commit(): void {}
}
