# App Inventory

Sistema de gestión de inventarios construido con **Laravel 12** + **Livewire 3** + **WireUI**.

## Funcionalidades

- **Productos** — CRUD completo con SKU, código de barras, precio y categoría
- **Categorías** — Organización de productos
- **Múltiples almacenes** — Gestión de inventario por warehouse
- **Inventario** — Stock actual por producto y almacén
- **Movimientos** — Entradas y salidas con tipo, serie y correlativo
- **Transferencias** — Traslado de stock entre almacenes
- **Ventas** — Registro de ventas
- **Compras** — Órdenes de compra y compras
- **Cotizaciones** — Generación de presupuestos
- **Clientes y Proveedores** — Gestión de terceros
- **Imágenes** — Soporte polimórfico de imágenes por producto
- **Autenticación** — Login, registro, 2FA y gestión de sesiones via Jetstream

## Stack técnico

| Componente | Tecnología |
|---|---|
| Backend | Laravel 12 + PHP 8.2 |
| Frontend | Livewire 3 + WireUI + Tailwind CSS |
| Auth | Laravel Jetstream + Sanctum |
| Base de datos | MySQL / SQLite |
| Tablas | rappasoft/laravel-livewire-tables |
| Node | Vite + PostCSS + Tailwind |

## Requisitos

- PHP ^8.2
- Composer
- Node.js
- MySQL o SQLite

## Instalación

```bash
git clone git@github.com:darkmariod/app-inventory-.git
cd app-inventory-

cp .env.example .env
# Configurar DB en .env

composer install
npm install

php artisan key:generate
php artisan migrate
php artisan serve

npm run dev
```

## Modelo de datos

- `products` — nombre, descripción, SKU, barcode, precio, categoría
- `categories` — nombre
- `warehouses` — nombre, ubicación
- `inventories` — stock por producto y almacén
- `movements` — movimientos de stock (tipo, serie, correlativo, fecha, total)
- `transfers` — transferencias entre almacenes
- `sales` — registro de ventas
- `purchases` / `purchase_orders` — compras y órdenes
- `quotes` — cotizaciones
- `customers` / `suppliers` — clientes y proveedores
- `identities` — tipos de identidad/documento
- `reasons` — motivos de movimiento
- `images` — imágenes polimórficas (productos, etc.)

## Licencia

MIT
