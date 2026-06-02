<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tables that exist in the app migrations but not in this MySQL database
        // Each table is wrapped in try/catch in case it already exists

        // 1. Personal Access Tokens (Sanctum)
        if (!Schema::hasTable('personal_access_tokens')) {
            Schema::create('personal_access_tokens', function (Blueprint $table) {
                $table->id();
                $table->morphs('tokenable');
                $table->string('name');
                $table->string('token', 64)->unique();
                $table->text('abilities')->nullable();
                $table->timestamp('last_used_at')->nullable();
                $table->timestamp('expires_at')->nullable();
                $table->timestamps();
            });
        }

        // 2. Identities (document types: DNI, RUC, etc.)
        if (!Schema::hasTable('identities')) {
            Schema::create('identities', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique();
                $table->timestamps();
            });
        }

        // 3. Warehouses
        if (!Schema::hasTable('warehouses')) {
            Schema::create('warehouses', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique();
                $table->string('location')->nullable();
                $table->timestamps();
            });
        }

        // 4. Customers
        if (!Schema::hasTable('customers')) {
            Schema::create('customers', function (Blueprint $table) {
                $table->id();
                $table->foreignId('identity_id')->constrained()->onDelete('cascade');
                $table->string('document_number')->unique();
                $table->string('name');
                $table->string('address')->nullable();
                $table->string('email')->nullable();
                $table->string('phone')->nullable();
                $table->timestamps();
            });
        }

        // 5. Reasons
        if (!Schema::hasTable('reasons')) {
            Schema::create('reasons', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->timestamps();
            });
        }

        // 6. Purchase Orders
        if (!Schema::hasTable('purchase_orders')) {
            Schema::create('purchase_orders', function (Blueprint $table) {
                $table->id();
                $table->integer('voucher_type');
                $table->string('serie');
                $table->integer('correlative');
                $table->timestamp('date');
                $table->foreignId('supplier_id')->constrained()->onDelete('cascade');
                $table->decimal('total', 10, 2)->default(0);
                $table->string('observation')->nullable();
                $table->timestamps();
            });
        }

        // 7. Purchases
        if (!Schema::hasTable('purchases')) {
            Schema::create('purchases', function (Blueprint $table) {
                $table->id();
                $table->integer('voucher_type');
                $table->string('serie');
                $table->integer('correlative');
                $table->timestamp('date');
                $table->foreignId('purchase_order_id')->constrained()->onDelete('cascade');
                $table->foreignId('supplier_id')->constrained()->onDelete('cascade');
                $table->foreignId('warehouse_id')->constrained()->onDelete('cascade');
                $table->decimal('total', 10, 2)->default(0);
                $table->string('observation')->nullable();
                $table->timestamps();
            });
        }

        // 8. Quotes
        if (!Schema::hasTable('quotes')) {
            Schema::create('quotes', function (Blueprint $table) {
                $table->id();
                $table->integer('voucher_type');
                $table->string('serie');
                $table->integer('correlative');
                $table->timestamp('date');
                $table->foreignId('customer_id')->constrained()->onDelete('cascade');
                $table->decimal('total', 10, 2)->default(0);
                $table->string('observation')->nullable();
                $table->timestamps();
            });
        }

        // 9. Sales
        if (!Schema::hasTable('sales')) {
            Schema::create('sales', function (Blueprint $table) {
                $table->id();
                $table->integer('voucher_type');
                $table->string('serie');
                $table->integer('correlative');
                $table->timestamp('date');
                $table->foreignId('quote_id')->constrained()->onDelete('cascade');
                $table->foreignId('customer_id')->constrained()->onDelete('cascade');
                $table->foreignId('warehouse_id')->constrained()->onDelete('cascade');
                $table->decimal('total', 10, 2)->default(0);
                $table->string('observation')->nullable();
                $table->timestamps();
            });
        }

        // 10. Movements
        if (!Schema::hasTable('movements')) {
            Schema::create('movements', function (Blueprint $table) {
                $table->id();
                $table->integer('type');
                $table->string('serie');
                $table->integer('correlative');
                $table->timestamp('date');
                $table->foreignId('warehouse_id')->constrained()->onDelete('cascade');
                $table->decimal('total', 10, 2)->default(0);
                $table->string('observation')->nullable();
                $table->foreignId('reason_id')->constrained()->onDelete('cascade');
                $table->timestamps();
            });
        }

        // 11. Transfers
        if (!Schema::hasTable('transfers')) {
            Schema::create('transfers', function (Blueprint $table) {
                $table->id();
                $table->integer('type');
                $table->string('serie');
                $table->integer('correlative');
                $table->timestamp('date');
                $table->decimal('total', 10, 2)->default(0);
                $table->string('observation')->nullable();
                $table->foreignId('origin_warehouse_id')->constrained('warehouses')->onDelete('cascade');
                $table->foreignId('destination_warehouse_id')->constrained('warehouses')->onDelete('cascade');
                $table->timestamps();
            });
        }

        // 12. Productables (polymorphic pivot for products in orders/quotes/sales/etc)
        if (!Schema::hasTable('productables')) {
            Schema::create('productables', function (Blueprint $table) {
                $table->id();
                $table->foreignId('product_id')->constrained()->onDelete('cascade');
                $table->morphs('productable');
                $table->integer('quantity')->default(0);
                $table->decimal('price', 10, 2)->default(0);
                $table->decimal('subtotal', 10, 2)->default(0);
                $table->timestamps();
            });
        }

        // 13. Inventories
        if (!Schema::hasTable('inventories')) {
            Schema::create('inventories', function (Blueprint $table) {
                $table->id();
                $table->string('detail')->nullable();
                $table->integer('quantity_in')->default(0);
                $table->decimal('cost_in', 10, 2)->default(0);
                $table->decimal('total_in', 10, 2)->default(0);
                $table->integer('quantity_out')->default(0);
                $table->decimal('cost_out', 10, 2)->default(0);
                $table->decimal('total_out', 10, 2)->default(0);
                $table->integer('quantity_balance')->default(0);
                $table->decimal('cost_balance', 10, 2)->default(0);
                $table->decimal('total_balance', 10, 2)->default(0);
                $table->foreignId('product_id')->constrained()->onDelete('cascade');
                $table->foreignId('warehouse_id')->constrained()->onDelete('cascade');
                $table->morphs('inventoryable');
                $table->timestamps();
            });
        }

        // 14. Images
        if (!Schema::hasTable('images')) {
            Schema::create('images', function (Blueprint $table) {
                $table->id();
                $table->string('path')->unique();
                $table->integer('size')->default(0);
                $table->morphs('imageable');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        // Drop in reverse order to respect foreign keys
        Schema::dropIfExists('images');
        Schema::dropIfExists('inventories');
        Schema::dropIfExists('productables');
        Schema::dropIfExists('transfers');
        Schema::dropIfExists('movements');
        Schema::dropIfExists('sales');
        Schema::dropIfExists('quotes');
        Schema::dropIfExists('purchases');
        Schema::dropIfExists('purchase_orders');
        Schema::dropIfExists('reasons');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('warehouses');
        Schema::dropIfExists('identities');
        Schema::dropIfExists('personal_access_tokens');
    }
};
