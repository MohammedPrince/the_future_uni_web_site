<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

/**
 * Indexes for lookups done on public pages. Skips any index or table that is
 * missing or already there, so it is safe to run on the live database.
 */
return new class extends Migration {
    private array $indexes = [
        'visitors' => ['visitors_ip_address_idx', '(ip_address(45))'],
        'fu_news' => ['fu_news_list_idx', '(del, news_date)'],
        'fu_events' => ['fu_events_list_idx', '(del, event_status, event_date)'],
    ];

    public function up()
    {
        if (DB::getDriverName() !== 'mysql') {
            return;
        }

        foreach ($this->indexes as $table => [$name, $columns]) {
            try {
                if (!DB::select("SHOW INDEX FROM `{$table}` WHERE Key_name = ?", [$name])) {
                    DB::statement("CREATE INDEX `{$name}` ON `{$table}` {$columns}");
                }
            } catch (\Throwable $e) {
                // An index is only an optimisation: never stop a deployment for it.
                report($e);
            }
        }
    }

    public function down()
    {
        foreach ($this->indexes as $table => [$name]) {
            try {
                DB::statement("DROP INDEX `{$name}` ON `{$table}`");
            } catch (\Throwable $e) {
                report($e);
            }
        }
    }
};
