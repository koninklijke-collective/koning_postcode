<?php
namespace Keizer\KoningPostcode\Utility;

/**
 * Utility: Postcode configuration
 *
 * @package Keizer\KoningPostcode\Utility
 */
class ConfigurationUtility
{
    /**
     * @return boolean
     */
    public static function isValid()
    {
        $settings = static::getPostcodeSettings();
        return (is_array($settings)
            && !empty($settings['apiKey'])
            && !empty($settings['secret'])
        );
    }
    /**
     * @return array
     */
    public static function getPostcodeSettings()
    {
        $configuration = static::getConfiguration();
        return (isset($configuration['postcode']) ? $configuration['postcode'] : $configuration['postcode.']);
    }

    /**
     * @return array
     */
    public static function getConfiguration()
    {
        static $configuration;
        if ($configuration === null) {
            $data = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['koning_postcode'];
            if (!is_array($data)) {
                $configuration = (array) unserialize($data);
            } else {
                $configuration = $data;
            }
        }
        return $configuration;
    }
}
