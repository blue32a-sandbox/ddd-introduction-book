<?php
// サークル参加処理のコマンドオブジェクト
class CircleJoinCommand
{
    public function __construct(
        public readonly string $userId,
        public readonly string $circleId
    ) {
    }
}
