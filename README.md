# App Inventory

Sistema de gestión de inventarios construido con Laravel 12. Administrá productos, categorías, almacenes, proveedores, clientes, y manejá movimientos de stock como compras, ventas, órdenes de compra, presupuestos y transferencias entre almacenes.

## Tech Stack

| Capa | Tecnología |
|------|-----------|
| **Backend** | PHP 8.2+, Laravel 12 |
| **Frontend** | Blade, Livewire 3, Tailwind CSS 4, Flowbite, WireUI |
| **Base de datos** | SQLite (default) — soporta MySQL, MariaDB, PostgreSQL, SQL Server |
| **Auth** | Laravel Jetstream + Fortify + Sanctum |
| **Build** | Vite 6 |

## Requisitos

- PHP ^8.2
- Composer
- Node.js 18+

## Instalación

```bash
git clone git@github.com:darkmariod/app-inventory-.git
cd app-inventory-

composer install
npm install

cp .env.example .env
php artisan key:generate

php artisan migrate
php artisan db:seed

npm run build
php artisan serve
```

## Entidades principales

- **Producto** → pertenece a Categoría, tiene inventario e imágenes
- **Inventario** → registro polimórfico de stock por producto + almacén con costo ponderado
- **Almacén** → depósitos físicos
- **Proveedor** / **Cliente** → terceros
- **Compra** / **Venta** / **Orden de Compra** / **Cotización** / **Transferencia** → documentos de movimiento

## Features

- CRUD completo de productos, categorías, almacenes, proveedores y clientes
- Tablas dinámicas con búsqueda y paginación (Livewire Tables)
- Subida y eliminación de imágenes de productos
- Manejo de stock con costo ponderado por producto y almacén
- Autenticación con Jetstream (Livewire stack)
- Interfaz admin en español

## Testing

```bash
php artisan test
```

## Desarrollo

```bash
npm run dev
```

Con Laravel Sail (Docker):

```bash
./vendor/bin/sail up
```
