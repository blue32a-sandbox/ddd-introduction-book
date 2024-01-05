<?php
// リスト13.14を利用してお勧めサークルを探す
class CircleApplicationService
{
    private readonly ICircleRepository $circleRepository;
    private readonly DateTime $now;

    // ...

    public function getRecommend(CircleGetRecommendRequest $request): CircleGetRecommendResult
    {
        $recommendCircleSpec = new CircleRecomendSpecification($this->now);

        // リポジトリに仕様を引き渡して抽出（フィルタリング）
        $recommendCircles = $this->circleRepository->find($recommendCircleSpec);

        return new CircleGetRecommendResult($recommendCircles);
    }
}
