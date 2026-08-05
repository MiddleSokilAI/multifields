# multiFields 3.x

## Українська

multiFields — кастомний тип TV для Evolution CMS. Він дозволяє відображати
структурований набір полів у Manager і використовувати ту саму конфігурацію на
фронтенді.

### Конфігурація TV

Створи PHP-файл конфігурації, який повертає масив налаштувань TV. Пакет ніколи
не створює відсутній конфіг автоматично.

Щоб опублікувати приклади конфігурацій пакета в
`core/custom/config/multifields/` і Blade-шаблони в `views/multifields/`,
виконай:

```bash
php artisan vendor:publish --tag=multiFields
```

Без `--force` команда не перезаписує файли, які вже існують у `core/custom`
або `views/multifields`.

### Frontend-шаблони

У контролері нормалізуй TV за його ім'ям:

```php
use Multifields\Facades\multiFields;

$this->data['constructor'] = multiFields::normalize('constructor');
```

У Blade-шаблоні кожен нормалізований блок автоматично підключає view з таким
самим іменем:

```blade
@foreach($constructor ?? [] as $item)
    @includeIf('multifields.' . $item['name'], ['items' => $item['items']])
@endforeach
```

Наприклад, блок із ключем `cards` використовує
`views/multifields/cards.blade.php`, а `hero_slider_sgallery` —
`views/multifields/hero_slider_sgallery.blade.php`. Відсутній view пропускається.
`hero_slider_sgallery` потребує встановленого та налаштованого `sGallery`.
Після публікації файли в `views/multifields/` належать проєкту й можуть
змінюватися без редагування пакета.

### Зберігання даних

multiFields завжди зберігає значення у TV бази даних. Пакет не створює
legacy-плагін у Manager і не записує JSON-файли в `core/custom`.

Для кожного TV директорії перевіряються в такому порядку:

1. `core/custom/config/multifields/` — специфічні для сайту перевизначення
2. `assets/plugins/multifields/config/` — застаріла конфігурація сайту
3. `core/vendor/evolution-cms-extras/multifields/config/` — значення пакета за замовчуванням

У межах кожної директорії імена файлів перевіряються в такому порядку:

1. Ім'я TV: `TV_NAME.php`
2. Точний ID TV: `TV_ID.php`
3. Базовий числовий ID TV: `TV_ID.php` для багатомовного ID, наприклад `123_uk`

Використовується перший знайдений файл. Тому `core/custom` є безпечним місцем
для перевизначення проєкту, а legacy- і package-конфіги лишаються фолбеками.

Якщо конфіг не знайдено, Manager покаже діагностичне повідомлення замість
створення поля з припущеною конфігурацією.

#### Приклад

Для TV з іменем `homepage_blocks` створи файл:

```php
<?php

return [
    'settings' => [],
    'templates' => [],
    'items' => [],
];
```

Збережи його як `core/custom/config/multifields/homepage_blocks.php`. Пакет
також містить legacy-приклад:
`assets/plugins/multifields/config/example.slider.php`.

### Ресурси пакета

PHP-класи елементів, шаблони, стилі та скрипти є ресурсами пакета й
завантажуються із `src/Elements/`. Не дублюй їх у
`assets/plugins/multifields/elements/`.

Дія шаблону Manager повертає JSON під час `OnManagerPageInit`; якщо запит
шаблону не вдається, він повертає JSON-помилку, а не HTML-сторінку Manager.

---

## English

multiFields is a custom TV input type for Evolution CMS. It lets a TV render a
structured set of fields in the Manager and use the same configuration when the
value is rendered on the front end.

### TV configuration

Create a PHP configuration file which returns the TV configuration array. The
package never creates a missing configuration file automatically.

To publish package configuration examples to
`core/custom/config/multifields/` and Blade views to `views/multifields/`, run:

```bash
php artisan vendor:publish --tag=multiFields
```

Without `--force`, the command does not overwrite files that already exist in
`core/custom` or `views/multifields`.

### Frontend views

In a controller, normalize a TV by its name:

```php
use Multifields\Facades\multiFields;

$this->data['constructor'] = multiFields::normalize('constructor');
```

In a Blade template, each normalized block automatically includes a view with
the matching name:

```blade
@foreach($constructor ?? [] as $item)
    @includeIf('multifields.' . $item['name'], ['items' => $item['items']])
@endforeach
```

For example, the `cards` block uses `views/multifields/cards.blade.php`, while
`hero_slider_sgallery` uses `views/multifields/hero_slider_sgallery.blade.php`.
A missing view is skipped. `hero_slider_sgallery` requires an installed and
configured `sGallery`.
After publishing, files in `views/multifields/` belong to the project and may
be changed without editing the package.

### Data storage

multiFields always stores values in the database TV value. The package does not
register a legacy Manager plugin or write JSON files to `core/custom`.

For each requested TV, directories are checked in this order:

1. `core/custom/config/multifields/` — site-specific overrides
2. `assets/plugins/multifields/config/` — legacy site configuration
3. `core/vendor/evolution-cms-extras/multifields/config/` — package defaults

Within each directory, file names are checked in this order:

1. TV name: `TV_NAME.php`
2. Exact TV ID: `TV_ID.php`
3. Base numeric TV ID: `TV_ID.php` for a multilingual ID such as `123_uk`

The first matching file wins. This makes `core/custom` the safe place for a
project override while preserving legacy and package configurations as
fallbacks.

If no configuration file is found, the Manager shows a diagnostic instead of
creating a field with an assumed configuration.

#### Example

For a TV named `homepage_blocks`, create:

```php
<?php

return [
    'settings' => [],
    'templates' => [],
    'items' => [],
];
```

Save it as `core/custom/config/multifields/homepage_blocks.php`. The package
also ships a legacy example at
`assets/plugins/multifields/config/example.slider.php`.

### Package resources

Element PHP classes, templates, styles and scripts are package resources and
are loaded from `src/Elements/`. Do not duplicate them into
`assets/plugins/multifields/elements/`.

The Manager template action responds with JSON during `OnManagerPageInit`; a
failed template request is reported as a JSON error rather than returned as a
Manager HTML page.
