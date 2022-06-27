<?php

namespace Perspective\NovaposhtaCatalogGraphQl\Model\Resolver\DataProvider;
use Magento\Framework\Api\SearchCriteriaBuilder;

class NovaposhtaCity
{

    /**
     * @var \Perspective\NovaposhtaCatalog\Api\CityRepositoryInterface
     */
    private $cityRepository;

    private SearchCriteriaBuilder $searchCriteriaBuilder;

    /**
     * @param \Perspective\NovaposhtaCatalog\Api\CityRepositoryInterface $cityRepository
     * @param \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        \Perspective\NovaposhtaCatalog\Api\CityRepositoryInterface $cityRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->cityRepository = $cityRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * @param $args array
     * @return array|void
     */
    public function resolve($args)
    {
        if ($args == null) {
            return;
        }
        $result = [];
        $searchCriteria = $this->searchCriteriaBuilder;
        foreach ($args['filter'] as $key => $value) {
            $searchCriteria->addFilter($key, $value);
        }
        $result['items'] = $this->cityRepository->getList($searchCriteria->create())->getItems();
        return $result;
    }
}

