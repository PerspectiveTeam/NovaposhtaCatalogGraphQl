<?php

namespace Perspective\NovaposhtaCatalogGraphQl\Model\Resolver\DataProvider;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Perspective\NovaposhtaCatalog\Api\WarehouseRepositoryInterface;

/**
 * Class NovaposhtaWarehouse
 */
class NovaposhtaWarehouse
{
    /**
     * @var \Perspective\NovaposhtaCatalog\Api\WarehouseRepositoryInterface
     */
    private $warehouseRepository;

    /**
     * @var \Magento\Framework\Api\SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;

    /**
     * NovaposhtaWarehouse constructor.
     *
     * @param \Perspective\NovaposhtaCatalog\Api\WarehouseRepositoryInterface $warehouseRepository
     * @param \Magento\Framework\Stdlib\ArrayManager $arrayManager
     */
    public function __construct(
        WarehouseRepositoryInterface $warehouseRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->warehouseRepository = $warehouseRepository;
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
        $result['items'] = $this->warehouseRepository->getList($searchCriteria->create())->getItems();
        return $result;
    }
}
