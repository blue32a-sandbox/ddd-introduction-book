<?php
// CircleMembersを利用した仕様
class CircleMembersFullSpecification
{
    public function isSpecifiedBy(CircleMembers $members): bool
    {
        $premiumUserNumber = $members->countPremiumMembers(false);
        $circleUpperLimit = $premiumUserNumber < 10 ? 30 : 50;
        return $members->countMembers() >= $circleUpperLimit;
    }
}
