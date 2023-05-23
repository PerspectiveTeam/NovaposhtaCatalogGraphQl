<?php


namespace Perspective\NovaposhtaCatalogGraphQl\Model\Resolver;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

class NovaposhtaStreet implements ResolverInterface
{

    private $novaposhtaStreetDataProvider;

    /**
     * @param DataProvider\NovaposhtaStreet $allCityRepository
     */
    public function __construct(
        DataProvider\NovaposhtaStreet $novaposhtaStreetDataProvider
    ) {
        $this->novaposhtaStreetDataProvider = $novaposhtaStreetDataProvider;
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
        return $this->novaposhtaStreetDataProvider->resolve($args);
    }
}

