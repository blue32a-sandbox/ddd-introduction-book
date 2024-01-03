<?php
// リスト12.7のisFullメソッドを利用して上限チェックを行う
if ($circle->isFull()) {
    throw new CircleFullException($circleId);
}
