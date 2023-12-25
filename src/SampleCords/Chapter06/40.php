<?php
// 自身のふるまいを変化させる目的で状態をもつ
class UserApplicationService
{
    public function __construct(
        private bool $sendMail
    ) {
    }

    // ...

    public function register(): void
    {
        // ...

        if ($this->sendMail) {
            $mailUtility->send('user registerd');
        }
    }
}
