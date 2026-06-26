# SummitPeak — Outdoor Gear E-Commerce

A full-featured outdoor gear e-commerce platform built with CodeIgniter 4.7+, featuring a **Neubrutalism** UI design, product variants (color/size/etc.), customer reviews with replies, saved shipping addresses, and complete cart-to-checkout flow.

---

## Features

### Product Management (Admin)
| Feature | Location |
|---------|----------|
| CRUD products | `Admin\Produk` controller + `admin/produk/` views |
| Product variants (color, size, etc.) | `Admin\Variant` controller + `admin/variant/` views |
| Image upload (file or URL) | Handled in `simpan()`/`update()` methods |
| Category assignment | Linked via `categories` table |
| Badge & specs | Free-text fields on product form |

### Product Variants
Each product can have unlimited variants (e.g. "Color: Red, Size: L", "Color: Blue, Size: M").

- **Database**: `product_variants` table with `product_id`, `name`, `price_adjustment`, `stock`, `sku`, `image`
- **Admin**: `/admin/produk/variant/{id}` — dynamic add/remove rows, each with name, SKU, price delta, stock, image
- **Frontend**: Product detail page shows variant selector buttons; price updates reflect adjustment; cart/checkout display chosen variant
- **Cart**: `cart.variant_id` stores the selected variant; `KeranjangModel` joins variants for display
- **Orders**: `order_items.variant_id` + `variant_name` persist the choice

### Shopping Cart
- Add with variant selection; quantity update; item removal
- **Database**: `cart` table with `user_id`, `product_id`, `variant_id`, `quantity`
- Auto-merge if same product+variant already in cart

### Checkout & Shipping
- **Saved Addresses**: `/address` — users manage multiple addresses (label, recipient, phone, full address, set default)
- **Checkout**: `/checkout` — select saved address as radio button or type a new one
- **Order creation**: `orders` table stores `shipping_address` text + optional `address_id` FK

### Customer Reviews
- **Submit**: Logged-in users submit rating (1-5) + comment per product
- **Replies**: Threaded — anyone can reply to a review (admin support)
- **Display**: Stars, username, avatar, date; replies indented below parent
- **Database**: `reviews` table with `parent_id` for threading

### User Profiles
- Registration with optional avatar upload
- `/profile` — edit username, change avatar
- Session stores `avatar` URL; header shows avatar image or first-letter fallback

### Neubrutalism UI
- Bold 3px solid borders everywhere (Tailwind `border-3`)
- Heavy offset shadows: `shadow-neubrutal` (4px), `shadow-neubrutal-lg` (6px)
- Sharp corners (`rounded-none` on all form elements & buttons)
- Warm cream dark mode (`#121412` base, `#fffbeb` light), vibrant orange accent (`#f97316`)
- Space Grotesk font for modern, chunky feel
- All buttons consistently styled: `.neubtn` / `.neubtn-accent` with hover lift and active press effects

### Theme Toggle
Dark/light mode persisted in `localStorage`; toggles CSS variables.

---

## Database Schema

### Tables

| Table | Purpose |
|-------|---------|
| `users` | User accounts + `avatar` column (added via migration) |
| `categories` | Product categories (Tents, Backpacks, etc.) |
| `products` | Core product data with `brand` field |
| `product_variants` | Variants per product (color/size/stock/etc.) |
| `cart` | Per-user cart items with variant support |
| `orders` | Completed orders with shipping info |
| `order_items` | Line items within an order (variant-aware) |
| `user_addresses` | Saved shipping addresses per user |
| `reviews` | Product reviews with threaded replies via `parent_id` |

### Migrations (run `php spark migrate`)
```
2026-06-26-180000_AddAvatarToUsers.php
2026-06-26-190000_CreateProductVariants.php
2026-06-26-190001_CreateUserAddresses.php
2026-06-26-190002_CreateReviews.php
2026-06-26-190003_AddVariantIdToCartAndOrders.php
```

---

## File Structure

### Controllers (`app/Controllers/`)

| File | Namespace | Routes | Description |
|------|-----------|--------|-------------|
| `Home.php` | `App\Controllers` | `GET /` | Landing page with featured products & category grid |
| `Auth.php` | `App\Controllers` | `/login`, `/register`, `/logout` | Login, registration (with avatar), logout |
| `Produk.php` | `App\Controllers` | `/produk`, `/produk/{slug}` | Product catalog listing, category/brand filters, product detail with variants & reviews |
| `Keranjang.php` | `App\Controllers` | `/keranjang` | Cart CRUD with variant support, ownership checks |
| `Checkout.php` | `App\Controllers` | `/checkout` | Checkout form with saved address selection, creates order |
| `Review.php` | `App\Controllers` | `/review/simpan`, `/review/balas/{id}` | Submit reviews and threaded replies |
| `Address.php` | `App\Controllers` | `/address` | CRUD saved addresses with ownership verification |
| `Orders.php` | `App\Controllers` | `/orders` | List user orders and view order detail |
| `Profile.php` | `App\Controllers` | `/profile` | Edit username & avatar |

### Admin Controllers (`app/Controllers/Admin/`)

| File | Namespace | Routes | Description |
|------|-----------|--------|-------------|
| `Dashboard.php` | `App\Controllers\Admin` | `/admin` | Stats overview (products, orders, users) |
| `Produk.php` | `App\Controllers\Admin` | `/admin/produk` | Full product CRUD with image upload (file or URL) |
| `Variant.php` | `App\Controllers\Admin` | `/admin/produk/variant/{id}` | Variant management — dynamic rows, bulk save |

### Models (`app/Models/`)

| File | Table | Key Fields | Description |
|------|-------|------------|-------------|
| `UserModel.php` | `users` | username, email, password, **avatar** | User accounts with profile picture |
| `ProdukModel.php` | `products` | category_id, name, slug, price, image, badge, specs, brand | Product queries with category join |
| `KategoriModel.php` | `categories` | name, slug | Category listing |
| `ProductVariantModel.php` | `product_variants` | product_id, name, price_adjustment, stock, sku, image | Variant CRUD scoped to product |
| `KeranjangModel.php` | `cart` | user_id, product_id, **variant_id**, quantity | Cart with variant-aware pricing (COALESCE price_adjustment) |
| `PesananModel.php` | `orders` | user_id, total, status, shipping_address, **address_id** | Order queries with items join |
| `ItemPesananModel.php` | `order_items` | order_id, product_id, **variant_id**, **variant_name**, quantity, price | Order line items |
| `UserAddressModel.php` | `user_addresses` | user_id, recipient, phone, address, city, province, postal_code, is_default | Saved addresses with set-default logic |
| `ReviewModel.php` | `reviews` | product_id, user_id, parent_id, rating, comment | Reviews with avg rating, reply threading |

### Filters (`app/Filters/`)

| File | Description |
|------|-------------|
| `AuthFilter.php` | Redirects to `/login?redirect={path}` if not authenticated |

### Config (`app/Config/`)

| File | Key Settings |
|------|-------------|
| `App.php` | `$permittedURIChars` — relaxed; slug generation handled via `mb_url_title()` |
| `Routes.php` | All routes with auth group for protected pages |
| `Database.php` | MySQLi connection (configure `.env` for credentials) |

### Views (`app/Views/`)

#### Layout
| File | Description |
|------|-------------|
| `layout/header.php` | Neubrutalism global header: nav, theme toggle, user avatar/initial, cart icon, Orders/Address/Profile/Admin links |
| `layout/footer.php` | Footer with site map, theme toggle JS, flash message auto-hide, mobile menu toggle |
| `admin/layout/header.php` | Admin header with sidebar nav |
| `admin/layout/footer.php` | Admin footer with JS |

#### Public Pages
| File | Description |
|------|-------------|
| `beranda.php` | Hero, bento category grid, featured products grid, newsletter |
| `produk/index.php` | Catalog with sidebar filters (category, brand), neubrutalism product cards |
| `produk/detail.php` | Product detail: image, info, variants selector, reviews with replies & submit form |
| `keranjang/index.php` | Cart items with variant name/price, quantity update, remove, checkout CTA |
| `checkout/index.php` | Saved address radio selection + manual address fallback, order summary |
| `auth/login.php` | Login form with redirect preservation |
| `auth/register.php` | Registration with optional avatar upload |

#### User Pages
| File | Description |
|------|-------------|
| `profile/index.php` | Avatar preview (image or initial), username edit, avatar upload |
| `address/index.php` | Saved addresses list with default badge, add form, set-default/delete actions |
| `orders/index.php` | Order history with status badges |
| `orders/detail.php` | Single order: shipping address, line items with variant info, total |

#### Admin Pages
| File | Description |
|------|-------------|
| `admin/dashboard.php` | Stats cards (products, orders, users) |
| `admin/produk/index.php` | Product table with Edit/Variant/Delete buttons |
| `admin/produk/form.php` | Add/Edit product form with image file+URL, variant management link |
| `admin/variant/index.php` | Dynamic variant rows with JS add/remove, bulk save |

### Database Migrations (`app/Database/Migrations/`)

| File | Changes |
|------|---------|
| `AddAvatarToUsers.php` | Adds `avatar VARCHAR(255)` column to `users` |
| `CreateProductVariants.php` | Creates `product_variants` table with FK to `products` |
| `CreateUserAddresses.php` | Creates `user_addresses` table with FK to `users` |
| `CreateReviews.php` | Creates `reviews` table with self-referencing `parent_id` FK |
| `AddVariantIdToCartAndOrders.php` | Adds `variant_id` to `cart` and `order_items`; adds `variant_name` to `order_items` |

---

## Quick Start

```bash
# 1. Configure database in .env or app/Config/Database.php
# 2. Run migrations
php spark migrate

# 3. Serve
php spark serve
```

**Requirements**: PHP 8.1+, MySQL 5.7+, Composer, CodeIgniter 4.7+

**`.env` example:**
```
database.default.hostname = localhost
database.default.database = summitpeak
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
```

---

## Fixes & Issue Resolution

| Issue | Resolution |
|-------|------------|
| URI disallowed characters (æ, ø, å) | `mb_url_title()` replaces `url_title()` — converts accented chars to ASCII (`æ` → `ae`) |
| Product images not showing after upload | Fixed `$file->move(FCPATH . 'uploads/...')` — was saving to project root instead of `public/` |
| No variant system | Added `product_variants` table, admin CRUD, frontend selector, cart/order integration |
| Can't save shipping address | Added `user_addresses` table, `/address` management page, radio selection at checkout |
| Can't write reviews / replies | Added `reviews` table, review form on product detail, threaded reply system |
| Profile shows initial only | Added `avatar` column, upload on register & profile edit, header displays image with initial fallback |
| Inconsistent button styling | Global neubrutalism CSS classes (`.neubtn`, `.neubtn-accent`) with consistent border/shadow/hover |
| Non-standard Tailwind `border-3` | Added `borderWidth: { '3': '3px' }` to all Tailwind configs |
| Missing ownership checks | Added user_id verification on `Address::update/hapus`, `Keranjang::update/hapus` |
| Auth filter loses redirect URL | AuthFilter now appends `?redirect=` param; login form & Auth controller preserve it |
