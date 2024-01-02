<?php
// サークルのファクトリ
interface ICircleFactory
{
    public function create(CircleName $name, User $owner): Circle;
}
