<?php
// お勧めサークルかどうかを見極める仕様オブジェクト
class CircleRecomendSpecification
{
    public function __construct(
        private readonly DateTime $executeDateTime
    ){
    }

    public function isSatisfiedBy(Circle $circle): bool
    {
        if ($circle->countMembers() < 10) {
            return false;
        }
        return $circle->created > $this->executeDateTime->modify('-1 month');
    }
}
