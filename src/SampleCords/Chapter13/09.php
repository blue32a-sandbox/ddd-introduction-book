<?php
// ファーストクラスコレクションに詰め替える
$owner = $this->userRepository->find($circle->owner->id);
$members = $this->userRepository->findByIds($circle->members);
$circleMembers = new CircleMembers($circle->id, $owner, $members);
$circleFullSpec = new CircleMembersFullSpecification();
if ($circleFullSpec->isSpecifiedBy($circleMembers)) {
    // ...
}
