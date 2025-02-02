<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Drop views first if they exist
        DB::statement("DROP VIEW IF EXISTS daily_revenue_view");
        DB::statement("DROP VIEW IF EXISTS vehicle_occupancy_view");

        // Create views
        DB::statement("
            CREATE VIEW daily_revenue_view AS
            SELECT
                DATE(payment_time) as date,
                COUNT(*) as total_transactions,
                SUM(amount) as total_revenue
            FROM payments
            WHERE payment_status = 'PAID'
            GROUP BY DATE(payment_time)
        ");

        DB::statement("
            CREATE VIEW vehicle_occupancy_view AS
            SELECT
                vehicle_types.type_name,
                COUNT(parking_sessions.id) as current_count
            FROM vehicle_types
            LEFT JOIN parking_sessions ON
                vehicle_types.id = parking_sessions.vehicle_type_id
                AND parking_sessions.status = 'ACTIVE'
            GROUP BY vehicle_types.id, vehicle_types.type_name
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS daily_revenue_view");
        DB::statement("DROP VIEW IF EXISTS vehicle_occupancy_view");
    }
};