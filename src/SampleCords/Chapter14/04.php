<?php
// インフラストラクチャ層の住人であるリポジトリ
class EFUserRepository implements IUserRepository
{
    public function __construct(
        private readonly ItdddDbContext $context
    ) {
    }

    public function find(UserId $id): ?User
    {
        $target = $this->context->Users->find($id->value);
        if ($target === null) {
            return null;
        }

        return $this->toModel($target);
    }

    public function findByIds(array $ids): array
    {
        $rawIds = array_map(
            fn ($x) => $x->value,
            $ids
        );

        $targets = $this->context->Users
            ->where(fn ($x) => in_array($x->id, $rawIds));

        return array_map(
            fn ($x) => $this->toModel($x),
            $targets
        );
    }

    public function findByName(UserName $name): ?User
    {
        $target = $this->context->Users
            ->where(fn ($x) => $x->name === $name->value)
            ->first();

        if ($target === null) {
            return null;
        }

        return $this->toModel($target);
    }

    // ...
}
