<?php
// リポジトリは仕様のインターフェースを受け取り結果セットを返す
interface ICircleRepository
{
    // ...

    public function find(ISpecification $spec): array;
}
