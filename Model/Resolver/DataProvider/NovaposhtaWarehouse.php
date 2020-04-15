<?php


namespace Perspective\NovaposhtaCatalogGraphQl\Model\Resolver\DataProvider;
/**
 * Class NovaposhtaWarehouse
 */
class NovaposhtaWarehouse
{
    /**
     * @var \Magento\Framework\Stdlib\ArrayManager
     */
    private $arrayManager;
    /**
     * @var \Perspective\NovaposhtaCatalog\Api\WarehouseRepositoryInterface
     */
    private $warehouseRepository;

    /**
     * NovaposhtaWarehouse constructor.
     * @param \Perspective\NovaposhtaCatalog\Api\WarehouseRepositoryInterface $warehouseRepository
     * @param \Magento\Framework\Stdlib\ArrayManager $arrayManager
     */
    public function __construct(
        \Perspective\NovaposhtaCatalog\Api\WarehouseRepositoryInterface $warehouseRepository,
        \Magento\Framework\Stdlib\ArrayManager $arrayManager
    ) {
        $this->arrayManager = $arrayManager;
        $this->warehouseRepository = $warehouseRepository;
    }

    /**
     * @param $args array
     * @return string|void
     */
    public function Resolve($args)
    {
        if ($args == null) {
            return;
        }
        $result = [];
        if ($this->arrayManager->exists('filter/warehouseById', $args)) {
            $result['warehouseById'] = $this->warehouseRepository->getWarehouseById($this->arrayManager->get('filter/warehouseById', $args))->getData();
        }
        if ($this->arrayManager->exists('filter/listOfWarehousesByCityRef', $args)) {
            $searchResult = $this->warehouseRepository->getListOfWarehousesByCityRef($this->arrayManager->get('filter/listOfWarehousesByCityRef/cityRef', $args),$this->arrayManager->get('filter/listOfWarehousesByCityRef/locale', $args));
            if (count($searchResult) === 0) {
                $result['listOfWarehousesByCityRef'] = null;
            }
            foreach ($searchResult as $idx => $data) {
                $result['listOfWarehousesByCityRef'][$idx] = $data;
            }
        }
        return $result;
    }
}

