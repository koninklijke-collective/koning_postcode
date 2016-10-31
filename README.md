# koning_postcode
TYPO3 eID wrapper around PostcodeNl_Api_RestClient. Depends on [postcode-nl/PostcodeNl_Api_RestClient](https://github.com/postcode-nl/PostcodeNl_Api_RestClient)

# Setup
Enter the API key and secret in Extension Manager configuration for this extension.

# Usage
Require the library by running: ``composer require postcode-nl/api-restclient``. eID is ``koning_postcode`` and accepts three parameters:

- postCode
- houseNumber
- houseNumberAddition (optional)
