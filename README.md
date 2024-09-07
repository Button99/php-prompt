# php-prompt
A PHP console utility package that provides spinners, progress bars, and color-coded console messages for better command-line user experience.

### Installation
To install the PhpPrompt, you need to have [Composer](https://getcomposer.org/) installed.

```bash
composer require ckoumpis/php-prompt
```

### Usage

#### Console
The `Console` class provides several methods to output colored messages.

List of available colors
<ul>
    <li>White: For simple logs (white) </li>
    <li>Success: For success messages (green)</li>
    <li>Error: For error messages (red) </li>
    <li>Warning: For warning messages (yellow) </li>
    <li>Blue: For information messages (blue) </li>
    <li>Magenta: For important messages (magenta) </li>
    <li>Cyan: For notifications (cyan) </li>
</ul>

```php
Console::log("Hello from ckoumpis/php-prompt!");
Console::success("Operation successful!");
Console::error("An error occurred!");
Console::warning("Warning");
Console::blue("This is a blue message");
Console::magenta("This is a magenta message");
Console::cyan("Cyan message for notification");
```

#### Progress Bar
The `ProgressBar` class allows you to visually display the progress of a task. You can use it with 2 ways.

1. Basic way.
```php
for($i =1; $i <=$total; $i++) {
    ProgressBar::display($i, $total);
    usleep(10000);
}
```

2. Using `withSteps` method
```php
ProgressBar::withSteps(1, 10,1);
```

#### Spinner
The `Spinner` class provides a simple loading animation for console, useful for indicating that an operation is in progress.You can use Spinner bar with 2 ways.

1. Basic way
```php
for($i = 0; $i < 10; $i++) {
    Spinner::spin();
    sleep(1);
}
```
2. Using `withSteps` method.
Or withSteps method
```php
Spinner::withSteps(0, 10, 1);
```

### Contributing
We welcome contributions! If you find a bug or have a feature request, please open an issue or submit a pull request on Github.