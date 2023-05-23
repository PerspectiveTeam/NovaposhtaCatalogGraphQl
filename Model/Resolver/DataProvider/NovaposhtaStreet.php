<?php

namespace Perspective\NovaposhtaCatalogGraphQl\Model\Resolver\DataProvider;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Perspective\NovaposhtaCatalog\Api\StreetRepositoryInterface;

/**
 * Class NovaposhtaStreet
 */
class NovaposhtaStreet
{
    /**
     * @var \Perspective\NovaposhtaCatalog\Api\WarehouseRepositoryInterface
     */
    private $streetRepository;

    /**
     * @var \Magento\Framework\Api\SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;

    /**
     * NovaposhtaWarehouse constructor.
     *
     * @param \Perspective\NovaposhtaCatalog\Api\StreetRepositoryInterface $streetRepository
     * @param \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        StreetRepositoryInterface $streetRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->streetRepository = $streetRepository;
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
        $result['items'] = $this->streetRepository->getList($searchCriteria->create())->getItems();
        return $result;
    }
}
