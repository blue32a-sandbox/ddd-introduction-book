<?php
// サークル作成処理のコマンドオブジェクト
class CircleCreateCommand
{
    public function __construct(
        public readonly string $userId,
        public readonly string $name
    ) {
    }
}
