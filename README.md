# Troia Account Telegram Bot

A PHP package to easily integrate Telegram Bot functionalities into your project.

## Installation

Install the package via Composer:

```sh
composer require troia-account/telegram-bot
```

Ensure your PHP version is 8.0 or higher.

## Usage

Initialize the Bot with your Telegram Bot token:

```php
<?php

require 'vendor/autoload.php';

use TroiaAccount\TelegramBot\Bot;

$bot = new Bot('your-telegram-bot-token');
```

## Features

- Easy setup and integration
- Send and receive messages
- Handle different types of Telegram updates
- Extendable for custom commands and functionalities

## Requirements

- PHP 8.0 or higher
- Composer

## Getting Started

1. **Create a new bot**: Talk to [BotFather](https://core.telegram.org/bots#botfather) to create a new bot and get the API token.
2. **Install the package**: Use Composer to install the package as shown above.
3. **Initialize the bot**: Use the provided example to initialize the bot with your token.

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request with your changes. Make sure to follow the coding standards and write tests for your new features.


## Contact

For any questions or support, please open an issue on [GitHub](https://github.com/troia-account/telegram-bot/issues).

---

Thank you for using Troia Account Telegram Bot! We hope it makes your development experience with Telegram Bots easier and more enjoyable.
