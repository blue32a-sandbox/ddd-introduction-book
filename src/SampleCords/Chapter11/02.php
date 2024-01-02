<?php
// サークルの名前を表す値オブジェクト
class CircleName implements IEquatable
{
    public function __construct(public readonly string $value)
    {
        if (strlen($this->value) < 3) {
            throw new InvalidArgumentException('サークル名は3文字以上です。');
        }
        if (strlen($this->value) > 20) {
            throw new InvalidArgumentException('サークル名は20文字以下です。');
        }
    }

    #[\Override]
    public function equals($other): bool
    {
        if (! $other instanceof self) {
            return false;
        }
        return $this->value === $other->value;
    }
}
