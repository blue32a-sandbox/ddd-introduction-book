<?php
// Userクラスのデータを公開するために定義されたDTO
class UserData
{
    public function __construct(
        public readonly string $id,
        public readonly string $name
    ) {
    }
}
