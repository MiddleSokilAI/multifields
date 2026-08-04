# MultiFields

MultiFields is a custom TV input type for Evolution CMS. It lets a TV render a
structured set of fields in the Manager and use the same configuration when the
value is rendered on the front end.

Documentation: <https://app.gitbook.com/@64j/s/multifields-2/>

## TV configuration

Create a PHP configuration file which returns the TV configuration array. The
package never creates a missing configuration file automatically.

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

### Example

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

## Package resources

Element PHP classes, templates, styles and scripts are package resources and
are loaded from `src/Elements/`. Do not duplicate them into
`assets/plugins/multifields/elements/`.

The Manager template action responds with JSON during `OnManagerPageInit`; a
failed template request is reported as a JSON error rather than returned as a
Manager HTML page.
