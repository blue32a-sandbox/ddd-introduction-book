<?php
// プロダクションに移行するためリポジトリを切り替える
// この修正のみで全体に変更が行き渡る
$serviceLocator->addInstance(IUserRepository::class, new UserRepository());
