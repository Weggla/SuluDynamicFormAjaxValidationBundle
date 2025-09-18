# Sulu ajax form validation bundle
A small bundle for Sulu CMS projects to validate dynamic forms with an ajax call. This bundle provides a route to post
your form data to. No form validation implementation for your website is bundled here. 

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![CircleCI](https://dl.circleci.com/status-badge/img/gh/Weggla/SuluDynamicFormAjaxValidationBundle/tree/main.svg?style=shield)](https://dl.circleci.com/status-badge/redirect/gh/Weggla/SuluDynamicFormAjaxValidationBundle/tree/main)

## Requirements
* Sulu 2.5.* || Sulu 2.6.*
* PHP >= 8.2

## Installation
```bash
composer require weggla/sulu-dynamic-form-ajax-validation-bundle
```

## Configuration

When not using symfony flex, enable the bundle in your bundles.php.
 ```php
# config/bundles.php
 return [
     ...,
     Sulu\Bundle\DynamicFormAjaxValidation\SuluDynamicFormAjaxValidationBundle::class => ['all' => true],
 ];
 ```

Import routes from the bundle.
 ```yaml
# config/routes.yaml
sulu_ajax_form_validation:
    resource: '../vendor/weggla/sulu-dynamic-form-ajax-validation-bundle/src/Controller'
    type: attribute
    prefix: /
 ```

## Usage
POST your form data to route "validate_dynamic_form_ajax" (/ajax/form/validate) and receive the validation result. 

## License
This bundle is published under the MIT license and totally free to use. Use it wherever you like! Contributions are always welcome – whether it’s bug reports, incompatibilities, or anything else you stumble upon.