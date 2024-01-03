<?php
// 識別子をインスタンスの代わりとして保持する
class Circle
{

    public function __construct(
        public readonly CircleId $id,
        private CircleName $name,

        /** @var UserId[] */
        private array $members
    ) {
    }
}
