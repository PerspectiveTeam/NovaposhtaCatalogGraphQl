<?php


namespace Perspective\NovaposhtaCatalogGraphQl\Model\Resolver;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

/**
 * Class CityById
 *
 * @package Perspective\NovaposhtaCatalogGraphQl\Model\Resolver
 */
class CityById implements ResolverInterface
{

    private $cityByIdDataProvider;

    /**
     * @param DataProvider\CityById $cityByIdRepository
     */
    public function __construct(
        DataProvider\CityById $cityByIdDataProvider
    ) {
        $this->cityByIdDataProvider = $cityByIdDataProvider;
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
        $cityByIdData = $this->cityByIdDataProvider->getCityById();
        return $cityByIdData;
    }
}

