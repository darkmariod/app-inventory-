# App Inventory

[![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?logo=php&logoColor=white)](https://php.net)
[![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?logo=laravel&logoColor=white)](https://laravel.com)
[![Livewire](https://img.shields.io/badge/Livewire-3-FB70A9?logo=livewire&logoColor=white)](https://livewire.laravel.com)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-4-06B6D4?logo=tailwindcss&logoColor=white)](https://tailwindcss.com)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

Sistema de gestión de inventarios construido con **Laravel 12**. Administrá productos, categorías, almacenes, proveedores, clientes y manejá movimientos de stock como compras, ventas, órdenes de compra, presupuestos y transferencias entre almacenes. Interfaz 100 % en español.

---

## Stack

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

| Entidad | Descripción |
|---------|-------------|
| **Producto** | Pertenece a una Categoría, tiene SKU, código de barras, precio, stock por almacén e imágenes |
| **Categoría** | Agrupación de productos |
| **Almacén** | Depósitos físicos donde se guarda stock |
| **Inventario** | Registro polimórfico de stock (cantidad y costo ponderado) por producto + almacén |
| **Proveedor** | Tercero vinculado a documento (CUIT/DNI). Tiene Órdenes de Compra y Compras |
| **Cliente** | Tercero vinculado a documento. Tiene Presupuestos y Ventas |
| **Orden de Compra** | Documento vinculado a Proveedor, con productos polimórficos |
| **Compra** | Documento vinculado a Proveedor + Orden de Compra |
| **Presupuesto** | Documento vinculado a Cliente |
| **Venta** | Documento vinculado a Cliente + Presupuesto |
| **Transferencia** | Movimiento entre almacenes (origen + destino) |
| **Movimiento** | Ajuste de stock con tipo, serie y correlativo |

## Features

- CRUD completo de productos, categorías, almacenes, proveedores y clientes
- Tablas dinámicas con búsqueda, paginación y ordenamiento (Livewire Tables)
- Subida y eliminación de imágenes de productos (Dropzone)
- Manejo de stock con **costo promedio ponderado** por producto y almacén
- Documentos: Órdenes de Compra, Compras, Presupuestos, Ventas, Transferencias, Movimientos
- Autenticación con Jetstream (verificación email, 2FA, API tokens con Sanctum)
- Interfaz admin 100 % en español con sidebar, breadcrumbs y SweetAlert2
- Notificaciones flash en operaciones CRUD

## Testing

```bash
php artisan test
```

## Desarrollo

```bash
npm run dev
php artisan serve
```

Con Laravel Sail (Docker):

```bash
./vendor/bin/sail up
```
