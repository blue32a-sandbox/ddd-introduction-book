<?php
// リポジトリにお勧めサークルを探し出すメソッドを追加する
interface ICircleRepository
{
    // ...

    /**
     * @return Circle[]
     */
    public function findRecommended(DateTime $now): array;
}
