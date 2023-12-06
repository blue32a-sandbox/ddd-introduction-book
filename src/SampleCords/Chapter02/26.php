<?php
// リスト2.25を利用したFullNameクラス
class FullName
{
    public function __construct(
        readonly public Name $firstName,
        readonly public Name $lastName
    ) {
    }
}
