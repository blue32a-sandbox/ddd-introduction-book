<?php
// 値を利用する前にルールに照らし合わせる必要がある
if (strlen($userName) >= 3) {
    // 正常な値なので処理を継続する
} else {
    throw new Exception('異常な値です');
}
