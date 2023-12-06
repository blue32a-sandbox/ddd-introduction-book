<?php
// 可能な限り値オブジェクトを適用したFullNameクラス
class FullName implements Equatable
{
    public function __construct(
        readonly public FirstName $firstName,
        readonly public LastName $lastName
    ) {
    }

    #[\Override]
    public function equals($other): bool
    {
        if (! $other instanceof self) {
            return false;
        }
        return $this->firstName->value == $other->firstName->value
            && $this->lastName->value == $other->lastName->value;
    }
}
