<?php


namespace Perspective\NovaposhtaCatalogGraphQl\Model\Resolver;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

/**
 * Class AllCity
 *
 * @package Perspective\NovaposhtaCatalogGraphQl\Model\Resolver
 */
class AllCity implements ResolverInterface
{

    private $allCityDataProvider;

    /**
     * @param DataProvider\AllCity $allCityRepository
     */
    public function __construct(
        DataProvider\AllCity $allCityDataProvider
    ) {
        $this->allCityDataProvider = $allCityDataProvider;
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
        $allCityData = $this->allCityDataProvider->getAllCity();
        return $allCityData;
    }
}

