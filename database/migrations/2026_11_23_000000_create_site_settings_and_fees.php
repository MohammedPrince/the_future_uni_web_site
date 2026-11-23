<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Lets the admin panel control the site:
 * - site_settings: contact details, links, announcement bar, maintenance mode.
 * - fee_sections / fee_items: the public Fee Structure page (it was fixed HTML).
 *   Filled with the figures the page showed before, so nothing changes for visitors.
 * - News: the public site showed every news item that was not deleted, whatever
 *   its status. Status now counts (admins can hide news), so every news item
 *   that is visible today is marked as published.
 */
return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('site_settings')) {
            Schema::create('site_settings', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->string('key', 100)->primary();
                $table->text('value')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('fee_sections')) {
            Schema::create('fee_sections', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->id();
                $table->string('title', 150);
                $table->string('note', 500)->nullable();
                $table->unsignedInteger('sort_order')->default(0);
                $table->boolean('is_visible')->default(true);
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('fee_items')) {
            Schema::create('fee_items', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->id();
                $table->unsignedBigInteger('fee_section_id')->index();
                $table->string('program', 150);
                $table->unsignedBigInteger('tuition_sdg')->nullable();
                $table->unsignedBigInteger('registration_sdg')->nullable();
                $table->unsignedBigInteger('tuition_usd')->nullable();
                $table->unsignedBigInteger('registration_usd')->nullable();
                $table->unsignedInteger('sort_order')->default(0);
                $table->boolean('is_visible')->default(true);
                $table->timestamps();
            });

            $this->seedFees();
        }

        if (Schema::hasTable('fu_news')) {
            DB::table('fu_news')->where('del', 0)->update(['news_status' => 1]);
        }
    }

    public function down()
    {
        Schema::dropIfExists('fee_items');
        Schema::dropIfExists('fee_sections');
        Schema::dropIfExists('site_settings');
    }

    private function seedFees(): void
    {
        $sections = [
            'Bachelor (Honours) Programs' => [
                ['Computer Engineering', 2000000, 700000, 5600, 300],
                ['Electronics Engineering', 2000000, 700000, 5600, 300],
                ['Mechatronics Engineering', 3000000, 700000, 5600, 300],
                ['Biomedical Engineering', 3000000, 700000, 5600, 300],
                ['Renewable Engineering', 2000000, 700000, 5600, 300],
                ['Telecommunication Engineering', 2200000, 700000, 6700, 300],
                ['Architecture Engineering', 2200000, 700000, 6700, 300],
                ['Computer Science', 1800000, 700000, 3950, 300],
                ['Software Engineering', 1800000, 700000, 3950, 300],
                ['Information Technology', 2000000, 700000, 4500, 300],
                ['Knowledge Management', 1800000, 700000, 3950, 300],
                ['Knowledge Engineering', 1800000, 700000, 3950, 300],
                ['Creative Multimedia', 1700000, 700000, 4500, 300],
                ['Interior Design', 2000000, 700000, 4500, 300],
                ['Graphics Technology', 1700000, 700000, 4500, 300],
                ['Geoinformatics', 1600000, 700000, 4500, 300],
                ['Business Administration', 2000000, 700000, 4500, 300],
                ['Marketing', 2000000, 700000, 4500, 300],
                ['Accounting and Finance', 2000000, 700000, 4500, 300],
                ['Human Resource Management', 2000000, 700000, 4500, 300],
            ],
            'Diploma Programs' => [
                ['Computer Engineering', 1800000, 700000, 2850, 300],
                ['Electronics Engineering', 1800000, 700000, 2850, 300],
                ['Networks Engineering', 1800000, 700000, 2850, 300],
                ['Telecommunication Engineering', 1800000, 700000, 2850, 300],
                ['Information Technology', 1800000, 700000, 1750, 300],
                ['E-Commerce', 1300000, 700000, 1750, 300],
                ['Information Technology Business and Accounting', 1800000, 700000, 1750, 300],
                ['Web Design', 1300000, 700000, 1750, 300],
            ],
        ];

        $now = now();
        $order = 0;
        foreach ($sections as $title => $rows) {
            $sectionId = DB::table('fee_sections')->insertGetId([
                'title' => $title,
                'sort_order' => $order += 10,
                'is_visible' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            $items = [];
            foreach ($rows as $i => [$program, $tuitionSdg, $registrationSdg, $tuitionUsd, $registrationUsd]) {
                $items[] = [
                    'fee_section_id' => $sectionId,
                    'program' => $program,
                    'tuition_sdg' => $tuitionSdg,
                    'registration_sdg' => $registrationSdg,
                    'tuition_usd' => $tuitionUsd,
                    'registration_usd' => $registrationUsd,
                    'sort_order' => ($i + 1) * 10,
                    'is_visible' => true,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
            DB::table('fee_items')->insert($items);
        }
    }
};
