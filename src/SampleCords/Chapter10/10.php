<?php
// マーキングのための手段を提供するエンティティの基底クラス
abstract class Entity
{
    protected function markNew(): void
    {
        UnitOfWork::$current->registerNew($this);
    }

    protected function markClean(): void
    {
        UnitOfWork::$current->registerClean($this);
    }

    protected function markDirty(): void
    {
        UnitOfWork::$current->registerDirty($this);
    }

    protected function markDeleted(): void
    {
        UnitOfWork::$current->registerDeleted($this);
    }
}
