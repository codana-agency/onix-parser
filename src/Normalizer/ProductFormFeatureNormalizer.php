<?php

namespace Ribal\Onix\Normalizer;

use Ribal\Onix\CodeList\CodeList196;
use Ribal\Onix\CodeList\CodeList220;
use Ribal\Onix\CodeList\CodeList79;
use Ribal\Onix\CodeList\CodeList98;
use Ribal\Onix\Product\ProductFormFeature;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

/**
 * Denormalizes a ProductFormFeature, choosing the code list of the
 * ProductFormFeatureValue based on the ProductFormFeatureType (list 79).
 */
class ProductFormFeatureNormalizer implements DenormalizerInterface
{
    /**
     * ProductFormFeatureType => code list class of its value.
     * Types not listed here fall back to CodeList98.
     */
    private const VALUE_LISTS = [
        '09' => CodeList196::class, // E-publication accessibility detail
        '15' => CodeList220::class, // E-publication format version code
    ];

    private $language;

    private $nameConverter;

    public function __construct(string $language = 'en')
    {
        $this->language = $language;
        $this->nameConverter = new ShortTagNameConverter();
    }

    public function supportsDenormalization($data, $type, $format = null, array $context = [])
    {
        return $type === ProductFormFeature::class && is_array($data);
    }

    public function denormalize($data, $type, $format = null, array $context = [])
    {
        $fields = [];
        foreach ($data as $key => $value) {
            $fields[$this->nameConverter->denormalize($key)] = $value;
        }

        $feature = new ProductFormFeature();

        $featureType = isset($fields['ProductFormFeatureType']) ? (string) $fields['ProductFormFeatureType'] : null;
        if ($featureType !== null) {
            $feature->setProductFormFeatureType(CodeList79::resolve($featureType, $this->language));
        }

        if (isset($fields['ProductFormFeatureValue'])) {
            $listClass = self::VALUE_LISTS[$featureType] ?? CodeList98::class;
            $feature->setProductFormFeatureValue($listClass::resolve((string) $fields['ProductFormFeatureValue'], $this->language));
        }

        if (isset($fields['ProductFormFeatureDescription'])) {
            $feature->setProductFormFeatureDescription((string) $fields['ProductFormFeatureDescription']);
        }

        return $feature;
    }

    public function getSupportedTypes(?string $format): array
    {
        return [ProductFormFeature::class => false];
    }
}
