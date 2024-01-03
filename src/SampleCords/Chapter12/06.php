<?php
// メンバーを追加する際の上限チェックを行うコード
if (count($circle->members) >= 29) {
    throw new CircleFullException($circle->id);
}
