# OrbitRemit Laravel Service Template

This template is designed to get you up and running quickly with standardised tools and a common folder structure for building a laravel service at OrbitRemit. Most of what is out of the box is suitable for many use cases however you will need to configure the template for your particular uses.

## Current Key Versions for this template

- PHP 8.x
- Laravel 8.x

## What's included?

- Readme template
- Dockerfile and docker-compose.yaml
- Github actions file for CI/Build processes
- Default composer.json with
    - JsonApi Standards Library (https://laraveljsonapi.io/)
    - Pest PHP - An elegant PHP testing framework (https://pestphp.com/)
    - OrbitRemit Services
    - OrbitRemit Logging - Formatted Stderr output to intergrate to Google logging and Error Reporting (https://github.com/orbitremit/laravel-google-cloud-logging)
    - OrbitRemit PubSub Push Callbacks (https://github.com/orbitremit/laravel-google-cloud-pubsub-push)
    - OrbitRemit Authentication/Authorisation (Coming soon)

## Folder Structure

    .
    ├── .github                # Github actions for release workdflows, CI and builing images
    ├── docs                   # Documentation on how to use the service should be put here
    ├── k8s                    # yaml configuration for staging and production environments should be put here.
    ├── src                    # Service source files
    ├── .dockerignore          # Files/Directories to ignore in docker commands
    ├── .editorconfig          # Standardised editor settings
    ├── .gitignore             # Common files and dirs to ingore in git
    ├── CODEOWNERs             # Owner/s of the repositoty
    ├── docker-compose.yaml    # Standarised setup for docker compose.
    ├── Dockerfile             # Standarised build file.
    └── README.md              # Readme template

## Features

### Logging

The `OrbitRemit Logging` package (https://github.com/orbitremit/laravel-google-cloud-logging) allows for logging/exceptions reported to stderr to be parsed by google cloud error reporting.

The following envs must be set for the logging to work correctly.

LOG_CHANNEL="stderr"
LOG_STDERR_FORMATTER="OrbitRemit\\LaravelGoogleCloudLogging\\Monolog\\Formatter\\StructuredLogFormatter"

### Callbacks

The `OrbitRemit PubSub Push Callbacks` package allows your service to receive callback requests from google pubsub push subscribes (basically listen to the events other services are publishing).

Review the following files for details of how to use callbacks

- src/Callbacks/ExampleCallback.php
- src/config/callbacks.php

### JSON API Complient Framwork

We utlise the JsonApi Standards Library (https://laraveljsonapi.io/) laravel package to support building jsonapi standard apis.

Boilerplate code is available at the following locations, however please read the documentation for details of how to implement the framework.

- src/JsonApi/V1/Server.php
- src/config/jsonapi.php
- src/routes/api.php

### Common Setup Configuration

- Set the approiporate ENVs and {service-name} within docker-compose.yaml
- Set the owners of the service within CODEOWNERS
