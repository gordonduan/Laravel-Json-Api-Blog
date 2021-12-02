# Service Name

High level description of the service.

## Key Responsibilities
- Key responsibility #1
- Key responsibility #2

## Usage Documentation
Can be found [here](./docs).

## URI

```sh
/example/v1
```

## Development
### Prerequisites

Ensure you have the latest [Development stack](https://github.com/orbitremit/development-stack.git) running.

### Installing

To get the project running on your environment you will need to:

Build the docker container.

```sh
$ docker-compose up -d server
```

Install composer packages

```sh
$ docker-compose run --rm composer run-script init:laravel
```

## Environment Variables

Detail any environment variables that may need to be set such as ids, secrets or keys.

Default environment variables are found inside the docker-compose.yml file, generally you wont need to change these. The following environment vars need to be set within your .env file.

- EXAMPLE_GATEWAY_AUTH_TOKEN
- EXAMPLE_CLIENT_ID
- EXAMPLE_CLIENT_SECRET

## Migrations

To get the database and tables setup run the following command.

```sh
$ docker-compose run artisan migrate:fresh
```

## Tests

Tests can be run with the following command.

```sh
$ docker-compose run --rm test
```

## Dependencies

List any key internal dependencies

-  [Rates Service](https://github.com/orbitremit/rates-service)

## Contributing

Tests must pass with the same or greater coverage

## Built With

Detail any key frameworks or libraries

- [Laravel 8.0](https://laravel.com)
