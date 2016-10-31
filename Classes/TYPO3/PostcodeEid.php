<?php

if (\Keizer\KoningPostcode\Utility\ConfigurationUtility::isValid()) {
    header('Content-Type: text/json');

    $postcodeService = new \Keizer\KoningPostcode\Service\PostcodeService();
    $address = array();
    $found = true;

    $settings = \Keizer\KoningPostcode\Utility\ConfigurationUtility::getPostcodeSettings();

    try {
        $address = $postcodeService
            ->setSettings($settings)
            ->fetchAddress(
                \TYPO3\CMS\Core\Utility\GeneralUtility::_GET('postcode'),
                \TYPO3\CMS\Core\Utility\GeneralUtility::_GET('houseNumber'),
                \TYPO3\CMS\Core\Utility\GeneralUtility::_GET('houseNumberAddendum')
            );
    } catch (\Exception $e) {
        $found = false;
    }

    if (!$found) {
        echo json_encode(array('result' => false));
    } else {
        echo json_encode(array('result' => $address));
    }
} else {
    throw new \Exception('Postcode configuration invalid. Check Extension Manager.');
}
