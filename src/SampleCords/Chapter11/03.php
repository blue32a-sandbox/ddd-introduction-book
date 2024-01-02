<?php
// サークルを表すエンティティ
class Circle
{
    public function __construct(
        public readonly CircleId $id,
        private CircleName $name,
        private User $owner,
        private array $members
    ) {
    }

    public function getName(): CircleName
    {
        return $this->name;
    }

    public function getOwner(): User
    {
        return $this->owner;
    }

    public function getMembers(): array
    {
        return $this->members;
    }
}
