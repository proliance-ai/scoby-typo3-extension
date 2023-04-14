# Dse Scoby (dse_scoby) TYPO3 extension

This TYPO3 extension integrates the is an ethical analytics tool the Sending data directly from your web server.

# Scoby Analytics PHP Client

[scoby](https://www.scoby.io) is an ethical analytics tool that helps you protect your visitors' privacy without sacrificing meaningful metrics. The data is sourced directly from your web server, no cookies are used and no GDPR, ePrivacy and Schrems II consent is required.


## Installation

## Usage
Instantiate your scoby analytics client using your API key and salt. 
```php
use Scoby\Analytics\Client;
$client = new Client('INSERT_YOUR_API_KEY_HERE', 'INSERT_YOUR_SALT_HERE');
```
After installing the extension in the project, you can specify the settings in the admin panel:
Settings > Extension Configuration > dse_scoby

## Support
Something's hard? We're here to help at [pr.typo3.com](mailto:pr.typo3.com)
