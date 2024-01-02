<?php
// サークルのリポジトリ
interface ICircleRepository
{
    public function save(Circle $circle): void;
    public function find(CircleId $id): ?Circle;
    public function findByName(CircleName $name): ?Circle;
}
