<?php


namespace Perspective\NovaposhtaCatalogGraphQl\Model\Resolver\DataProvider;
/**
 * Class NovaposhtaCity
 */
class NovaposhtaCity
{

    /**
     * @var \Perspective\NovaposhtaCatalog\Api\CityRepositoryInterface
     */
    private $cityRepository;
    /**
     * @var \Magento\Framework\Stdlib\ArrayManager
     */
    private $arrayManager;

    /**
     * NovaposhtaCity constructor.
     * @param \Perspective\NovaposhtaCatalog\Api\CityRepositoryInterface $cityRepository
     * @param \Magento\Framework\Stdlib\ArrayManager $arrayManager
     */
    public function __construct(
        \Perspective\NovaposhtaCatalog\Api\CityRepositoryInterface $cityRepository,
        \Magento\Framework\Stdlib\ArrayManager $arrayManager
    ) {

        $this->cityRepository = $cityRepository;
        $this->arrayManager = $arrayManager;
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
        if ($this->arrayManager->exists('filter/allCity', $args)) {
            $result['items'] = $this->cityRepository->getAllCity($this->arrayManager->get('filter/allCity', $args));
        }
        if ($this->arrayManager->exists('filter/allCityReturnCityId', $args)) {
            $result['itemsWithId'] = $this->cityRepository->getAllCityReturnCityId($this->arrayManager->get('filter/allCityReturnCityId', $args));
        }
        if ($this->arrayManager->exists('filter/cityById', $args)) {
            $result['cityById'] = $this->cityRepository->getCityById($this->arrayManager->get('filter/cityById', $args))->getData();
        }
        if ($this->arrayManager->exists('filter/cityByCityRef', $args)) {
            $result['cityByCityRef'] = $this->cityRepository->getCityByCityRef($this->arrayManager->get('filter/cityByCityRef', $args))->getData();
        }
        if ($this->arrayManager->exists('filter/cityByCityId', $args)) {
            $result['cityByCityId'] = $this->cityRepository->getCityByCityId($this->arrayManager->get('filter/cityByCityId', $args))->getData();
        }
        if ($this->arrayManager->exists('filter/cityByName', $args)) {
            $searchResult = $this->cityRepository->getCityByName($this->arrayManager->get('filter/cityByName', $args));
            if (count($searchResult) === 0) {
                $result['cityByName'] = null;
            }
            foreach ($searchResult as $idx => $data) {
                $result['cityByName'][$idx] = $data->getData();
            }
        }
        return $result;
    }
}

