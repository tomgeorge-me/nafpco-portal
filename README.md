# NAFPCO Public Portal

Public-facing Laravel 13 website for **Neyyassery Agro Food Producer
Company Limited (NAFPCO)**. This is a *separate* app from your existing
ERP — it reads product data from the same MySQL database (`nafpco_app`)
but has no admin panel and never touches sales, customers, users, or
financial tables.

Requires **PHP 8.3+** (Laravel 13's minimum).

## What's included

- **Home, About, Farmer Connectivity, Contact** — static-content pages
  driven by `config/company.php` (your CIN, address, incorporation date).
- **Products** — catalog list (filterable by category) and detail pages,
  reading from the ERP's `inventory_items` table.
- **Contact / Enquiry form** — writes to the `enquiries` table, with a
  honeypot field and rate limiting against spam.

## What is NOT included (by design)

- No login or admin UI — content updates happen via the ERP.
- No pricing shown publicly — product pages show "Enquire for price."
- No exposure of `cost_price`, `quantity`, `reorder_level`, `gst_rate`,
  `sku`, `item_code`, or `barcode` anywhere in the public app — these are
  stripped at the model level (`App\Models\Product::$visible`), not just
  hidden in the views, so a future template can't accidentally leak them.
- **No migrations.** The schema changes this app depends on now live in
  your ERP app's own migration set — see below for the contract.

## Schema this app depends on (owned by the ERP app)

You've moved these into the ERP app's migrations, so they're not
duplicated here. This app expects, on the shared `nafpco_app` database:

**`inventory_items`** — the ERP's existing table, plus:
| column | type | notes |
|---|---|---|
| `slug` | string, nullable, unique | auto-filled from `name` if left blank |
| `category` | string, nullable, indexed | `spices` \| `baked-goods` \| `beverages` |
| `image_path` | string, nullable | relative to `storage/app/public`, e.g. `products/cardamom.jpg` |
| `is_public_visible` | boolean, default `false`, indexed | nothing shows on the site until this is `true` |

**`enquiries`** — new table:
| column | type |
|---|---|
| `id` | bigint, PK |
| `name`, `email` | string |
| `phone`, `subject` | string, nullable |
| `message` | text |
| `inventory_item_id` | bigint, nullable, FK → `inventory_items.id`, null on delete |
| `status` | string, default `new` |
| `ip_address` | ip address, nullable |
| `created_at` / `updated_at` | timestamps |

If your ERP-side migrations diverge from this (different column names,
types), update `app/Models/Product.php` and `app/Models/Enquiry.php` to
match — those two files are the only place this app's data contract is
defined.

## 1. Install

```bash
composer install
cp .env.example .env
php artisan key:generate
```

## 2. Point it at your ERP database

Edit `.env` — set `DB_DATABASE=nafpco_app` and matching host/credentials.

**Before going live, create a restricted MySQL user** for this app instead
of reusing ERP admin credentials (full SQL is in `.env.example`):

```sql
CREATE USER 'nafpco_public'@'%' IDENTIFIED BY 'CHANGE_ME';
GRANT SELECT ON nafpco_app.inventory_items TO 'nafpco_public'@'%';
GRANT SELECT, INSERT, UPDATE ON nafpco_app.enquiries TO 'nafpco_public'@'%';
FLUSH PRIVILEGES;
```

This way, even a bug or compromise in the public site can never read or
touch `sales`, `customers`, `shareholders`, `users`, `expenses`, etc.

That GRANT deliberately does **not** cover `sessions`, `cache`, or `jobs`
— this app is configured to use file-based sessions/cache and a `sync`
queue (see `.env.example`) instead of the `database` driver, precisely
so it never has to share those tables with the ERP app. If you'd rather
use the `database` driver for any of those, widen the GRANT to include
the relevant table(s) first.

## 3. Make sure the ERP app's migrations have run

This app doesn't run any migrations itself — confirm the ERP app has
already applied the `inventory_items` column additions and created
`enquiries` (see the schema contract above) before starting the portal.

## 4. Mark products for public display

Nothing shows on the site until you flag it. From the ERP side (or
`php artisan tinker` in this app), for each product you want listed:

```php
$item = \App\Models\Product::find($id);
$item->update([
    'category' => 'spices', // or 'baked-goods' / 'beverages'
    'is_public_visible' => true,
    'image_path' => 'products/your-image.jpg', // relative to storage/app/public
]);
```

Slugs are generated automatically from the product name if left blank.

Optionally, for local testing only, `php artisan db:seed` will flag your
existing sample inventory items as public (round-robin across the three
categories) so you have something to look at immediately — requires the
ERP app's migrations to have run first. **Don't run this against
production** unless you're happy with those defaults.

## 5. Product images

```bash
php artisan storage:link
```

Then upload images to `storage/app/public/products/` and reference them
via the `image_path` column (e.g. `products/cardamom.jpg`).

## 6. Run it

```bash
php artisan serve
```

Visit `http://127.0.0.1:8000`.

## Notes on the design

The visual language (deep canopy green, turmeric/chili accents, the
"registered producer" seal badge, contour-line hero texture) is meant to
read as *this specific company* — a registered, active farmer producer
company rooted in Idukki's hill terrain — rather than a generic template.
All of it lives in `public/css/app.css` and `resources/views/partials/`,
no build step (Vite/npm) required.

## Extending later

- **Connect the same catalog to your ERP's own admin** so staff can flip
  `is_public_visible` and set `category`/`image_path` from inside the ERP
  UI instead of tinker/SQL.
- **News/Gallery** — not built yet; straightforward to add as another
  read-only section once you decide where that content should live.
