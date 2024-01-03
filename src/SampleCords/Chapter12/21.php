<?php
// 識別子をゲッターで公開する
class Circle
{
    public function __construct(
        public readonly CircleId $id,
        private CircleName $name,
        private UserId $owner,

        /** @var UserId[] */
        private array $members
    ) {
    }

    public function notify(ICircleNotification $note): void
    {
        $note->id($this->id);
        $note->name($this->name);
        $note->owner($this->owner);
        $note->members($this->members);
    }

    // ...
}
