<?php
// 仕様のインターフェースと実装クラス
interface ISpecification
{
    public function isSatisfiedBy($value): bool;
}

class CircleRecommendSpecification implements ISpecification
{
    // ...
}
