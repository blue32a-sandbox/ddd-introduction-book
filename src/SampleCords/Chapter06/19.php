<?php
// コマンドオブジェクトを利用してアプリケーションサービスの制御を行う
$updateNameCommand = new UserUpdateCommand(id: $id, name: 'naruse');
$userApplicationService->update($updateNameCommand);

// メールアドレス変更だけを行うように
$updateMailAddressCommand = new UserUpdateCommand(id: $id, mailAddress: 'xxxx@example.com');
$userApplicationService->update($updateMailAddressCommand);
