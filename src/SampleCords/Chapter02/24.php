<?php
// FullNameでルールを担保する
class FullName
{
    public function __construct(
        readonly public string $firstName,
        readonly public string $lastName
    ) {
        if (! $this->validateName($firstName)) {
            throw new InvalidArgumentException('許可されていない文字が使われています。');
        }
        if (! $this->validateName($lastName)) {
            throw new InvalidArgumentException('許可されていない文字が使われています。');
        }
    }

    private function validateName(string $value): bool
    {
        return preg_match('/^[a-zA-z]+$/', $value) === 1;
    }
}
