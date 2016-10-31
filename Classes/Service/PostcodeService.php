<?php
namespace Keizer\KoningPostcode\Service;

/**
 * Service: Postcode
 *
 * @package Keizer\KoningPostcode\Service
 */
class PostcodeService
{
    /**
     * @var array
     */
    protected $settings = array(
        'apiKey' => '',
        'secret' => ''
    );

    /**
     * Set the settings
     *
     * @param array $settings
     * @return PostcodeService
     */
    public function setSettings(array $settings)
    {
        $this->settings = $settings;
        return $this;
    }

    /**
     * Attempt to fetch the address based on the provided parameters
     *
     * @param string $postcode
     * @param integer $houseNumber
     * @param string $houseNumberAddition
     * @return array
     * @throws \Exception
     * @see https://github.com/postcode-nl/PostcodeNl_Api_RestClient
     */
    public function fetchAddress($postcode, $houseNumber, $houseNumberAddition = null)
    {
        $restClient = new \PostcodeNl_Api_RestClient($this->settings['apiKey'], $this->settings['secret']);
        try {
            $address = $restClient->lookupAddress($postcode, $houseNumber, $houseNumberAddition, false);
        } catch (\Exception $e) {
            throw new \Exception('Postcode/houseNumber not found: ' . $e->getMessage());
        }
        return $address;
    }
}
