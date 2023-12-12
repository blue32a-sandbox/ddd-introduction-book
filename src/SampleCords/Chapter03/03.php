<?php
// クライアントで事前に検査する

$name = $request->get('name', '');

if ($name === '') {
    throw new InvalidArgumentException('リクエストのnameがnullまたは空です。');
}

$user->changeName($name);
