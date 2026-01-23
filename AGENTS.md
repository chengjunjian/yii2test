# AGENTS.md

This guide is for automated coding agents working in this repository.
Follow existing conventions and keep changes minimal and consistent.

## Repository Snapshot
- Framework: Yii2 (PHP 8.1+)
- Autoloading: PSR-4, `app\` namespace maps to repo root
- Entrypoint: `web/index.php`
- Primary config: `config/web.php`

## Repository Layout
- `controllers/` holds controller classes and web actions.
- `views/` holds PHP templates rendered by controllers.
- `config/` holds application configuration arrays.
- `web/` is the webroot and front controller.
- `vendor/` is Composer-managed dependencies (do not edit manually).

## Commands
There are no explicit build, lint, or test scripts defined in this repo.
Use the commands below as the current, known workflow.

### Install dependencies
- `composer install`

### Run the app locally
- Docker (preferred here): `docker compose up`
  - App serves on `http://localhost:80`
  - Uses the mounted repo volume in the container
  - MariaDB and Redis services are also started (see `docker-compose.yml`).
- PHP built-in server (if you have PHP 8.1+ locally):
  - `php -S localhost:8080 -t web`

### Lint
- No lint tooling configured in the repo.
- If you add one, document the exact command here.
- Use `php -l` only for quick spot checks, not as a project lint step.

### Tests
- No PHPUnit config (`phpunit.xml*`) or `tests/` directory found.
- If tests are added, update this section with the real command.
- Avoid adding ad-hoc test scripts without documenting them here.

### Run a single test
- Not available yet because PHPUnit is not configured.
- Typical Yii2/PHPUnit pattern once configured:
  - `vendor/bin/phpunit tests/Feature/MyTest.php`
  - `vendor/bin/phpunit --filter testName tests/Feature/MyTest.php`
- If you add Codeception instead, replace these examples accordingly.

## Code Style Guidelines
Keep changes aligned with existing Yii2 conventions and the current files.

### PHP version and strictness
- Target PHP 8.1+ (from `composer.json`).
- Prefer `declare(strict_types=1);` in new PHP files unless a file is
  intentionally a template/partial in `views/`.
- Keep strict types at the top after `<?php` and a blank line.

### Namespaces and autoloading
- Application namespace is `app\` and maps to the repo root.
- Controllers live in `controllers/` with `app\controllers` namespace.
- Views live in `views/` and do not define namespaces.
- Do not introduce additional autoloaders unless necessary.

### File and class naming
- Class names: `PascalCase` (e.g., `SiteController`).
- Controller actions: `actionXyz` (e.g., `actionIndex`).
- File names match class names (e.g., `controllers/SiteController.php`).
- Method names use `camelCase` and should be verbs.

### Imports
- Use `use` statements for classes (one per line).
- Avoid fully qualified class names inline, except in bootstrap/entry files.
- Keep imports minimal and remove unused ones.
- Group framework imports above app-level imports when both exist.

### Formatting
- 4 spaces for indentation, no tabs.
- Use short array syntax `[]`.
- Align array keys with `=>` when already aligned in a file.
- Blank line after `<?php` and before namespace when present.
- One class per file.
- Prefer trailing commas in multi-line arrays for cleaner diffs.

### Types and signatures
- Add return types and parameter types where possible.
- Prefer `string`, `int`, `bool`, `array`, and class types.
- Use nullable types when needed (e.g., `?string`).
- Avoid mixed types unless a method truly requires them.

### Controllers and actions
- Keep controller actions short and focused on flow.
- Move reusable logic into services or models as it grows.
- Return rendered views with `$this->render()` for HTML responses.
- For JSON APIs, use Yii response formatters instead of `echo`.

### Views
- Keep views mostly presentational; avoid heavy logic.
- Use PHP docblocks for expected variables (as in `views/site/index.php`).
- Set page titles via `$this->title`.
- Escape user-provided content with `Html::encode()` or helpers.

### Configuration
- Config files return plain PHP arrays (see `config/web.php`).
- Avoid hardcoding secrets; use env vars or deployment config instead.
- Preserve existing structure (`components`, `bootstrap`, etc.).
- Keep configuration changes minimal and scoped to their component.

### Error handling and logging
- Prefer throwing exceptions over `die/exit`.
- Use Yii error handling (`Yii::error`, `Yii::warning`) for logging.
- Keep user-facing errors generic; log details for diagnostics.
- When adding try/catch, rethrow with context or log explicitly.

### Security
- Ensure `request.cookieValidationKey` is set to a secure value in real
  deployments; do not commit secrets.
- Avoid echoing unescaped user input in views.
- Use parameter binding for DB queries to avoid injection.

### Data access (if added)
- Prefer Yii2 components (`Yii::$app->db`, ActiveRecord) over raw PDO.
- Keep queries in models or dedicated services, not in controllers/views.
- For complex queries, consider Query Builder for readability.

### Tests (if added)
- Group tests by feature/unit folders.
- Keep test names descriptive and aligned with class names.
- Use fixtures or factories for repeatable data.
- Avoid relying on external services in unit tests.

### Dependency management
- Use Composer for PHP dependencies only.
- Do not edit files under `vendor/`.
- Document any new PHP extensions required by new dependencies.

### Documentation
- Update `README.md` if you change setup steps or runtime commands.
- Keep doc updates focused on user-visible workflow changes.

## Agent Notes
- No Cursor rules (`.cursor/rules/` or `.cursorrules`) found.
- No Copilot instructions (`.github/copilot-instructions.md`) found.
- If any of these files are added later, update this document accordingly.

## Safe Change Checklist
- Match existing style and indentation.
- Keep changes scoped; avoid unrelated refactors.
- Update this file if you add tooling or change commands.
