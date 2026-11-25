<?php

namespace Ribal\Onix\Product;

use Ribal\Onix\CodeList\CodeList;

class ProductFormFeature
{

    /**
     * ProductFormFeatureType
     *
     * @var CodeList
     */
    protected $ProductFormFeatureType;

    /**
     * ProductFormFeatureValue
     *
     * @var CodeList
     */
    protected $ProductFormFeatureValue;

    /**
     * ProductFormFeatureDescription
     *
     * @var string
     */
    protected $ProductFormFeatureDescription;

    /**
     * Set ProductFormFeatureType
     *
     * @param CodeList $ProductFormFeatureType
     * @return void
     */
    public function setProductFormFeatureType(CodeList $ProductFormFeatureType)
    {
        $this->ProductFormFeatureType = $ProductFormFeatureType;
    }

    /**
     * Set ProductFormFeatureValue
     *
     * @param CodeList $ProductFormFeatureValue
     * @return void
     */
    public function setProductFormFeatureValue(CodeList $ProductFormFeatureValue)
    {
        $this->ProductFormFeatureValue = $ProductFormFeatureValue;
    }

    /**
     * Set ProductFormFeatureDescription
     *
     * @param string $description
     * @return void
     */
    public function setProductFormFeatureDescription(string $description)
    {
        $this->ProductFormFeatureDescription = $description;
    }

    /**
     * Get ProductFormFeatureType
     *
     * @return CodeList
     */
    public function getProductFormFeatureType()
    {
        return $this->ProductFormFeatureType;
    }

    /**
     * Get ProductFormFeatureValue
     *
     * @return CodeList
     */
    public function getProductFormFeatureValue()
    {
        return $this->ProductFormFeatureValue;
    }

    /**
     * Get ProductFormFeatureDescription
     *
     * @return string
     */
    public function getProductFormFeatureDescription()
    {
        return $this->ProductFormFeatureDescription;
    }
}