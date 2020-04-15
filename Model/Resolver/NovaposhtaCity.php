<?php


namespace Perspective\NovaposhtaCatalogGraphQl\Model\Resolver;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

class NovaposhtaCity implements ResolverInterface
{

    private $novaposhtaCityDataProvider;

    /**
     * @param DataProvider\NovaposhtaCity $allCityRepository
     */
    public function __construct(
        DataProvider\NovaposhtaCity $NovaposhtaCityDataProvider
    ) {
        $this->novaposhtaCityDataProvider = $NovaposhtaCityDataProvider;
    }

    /**
     * @inheritdoc
     */
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {
        $cityData = $this->novaposhtaCityDataProvider->Resolve($args);
        return $cityData;
    }
}

