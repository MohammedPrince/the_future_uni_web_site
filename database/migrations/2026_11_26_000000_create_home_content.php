<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Home page content managed in the admin panel:
 * - home_slides: the big slider at the top (image, texts, order).
 * - testimonials: the Alumni Testimonials section.
 * - home_order on news and events: optional position on the home page.
 * Both tables start with what the home page showed before, so nothing changes for visitors.
 */
return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('home_slides')) {
            Schema::create('home_slides', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->id();
                $table->string('subtitle', 150)->nullable();
                $table->string('title', 250);
                $table->string('alt', 200)->nullable();
                $table->string('button_text', 60)->nullable();
                $table->string('button_url', 500)->nullable();
                // Image files: "<image>-<width>.<ext>" under /public, one per width.
                $table->string('image', 255);
                $table->string('widths', 100);
                $table->string('ext', 10)->default('webp');
                $table->unsignedInteger('img_width')->default(2200);
                $table->unsignedInteger('img_height')->default(1467);
                $table->unsignedInteger('sort_order')->default(0);
                $table->boolean('is_visible')->default(true);
                $table->timestamps();
            });

            $now = now();
            DB::table('home_slides')->insert([
                [
                    'subtitle' => 'TOP PRIVATE UNIVERSITY',
                    'title' => 'Inspiring Excellence, Empowering Minds,Transforming Future.',
                    'alt' => 'Students of The Future University',
                    'image' => 'client/img/hero-slider/1', 'widths' => '640,1024,1600,2200', 'ext' => 'webp',
                    'img_width' => 2200, 'img_height' => 1467, 'sort_order' => 10, 'is_visible' => true,
                    'created_at' => $now, 'updated_at' => $now,
                ],
                [
                    'subtitle' => 'Why The Future University?',
                    'title' => 'An investment in knowledge pays the best interest.',
                    'alt' => 'A student of The Future University at her desk',
                    'image' => 'client/img/hero-slider/2', 'widths' => '640,1024,1600,2200', 'ext' => 'webp',
                    'img_width' => 2200, 'img_height' => 1467, 'sort_order' => 20, 'is_visible' => true,
                    'created_at' => $now, 'updated_at' => $now,
                ],
            ]);
        }

        if (!Schema::hasTable('testimonials')) {
            Schema::create('testimonials', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->id();
                $table->string('name', 150);
                $table->string('position', 250)->nullable();
                $table->text('quote');
                $table->string('photo', 255)->nullable();
                $table->unsignedInteger('sort_order')->default(0);
                $table->boolean('is_visible')->default(true);
                $table->timestamps();
            });

            $now = now();
            $rows = [
                ['Baraa Mohammed Bashir', 'HR Officer, DAL Group.', 'Computerman as it was called before, now The Future University, is my door to the future. It is a place where my base skills and knowledge started from.', 'BaraaMohammedBashir-100x100.jpg'],
                ['Najeeb Ahmad Zai', 'Supervisor, Dubai, UAE.', 'Being a FU graduated student, I can say that it is one of the best institutions to learn modern and up-to-date technology education.', 'NajeebAhmadZai-100x100.jpg'],
                ['Khalid Faza', 'Chief Commercial Officer (CCO), Zain.', 'It is really great to be an alumnus of the Future University (Computer Man College) which had such a strong system. I believe that whatever I have achieved today is just because of what I had learned in FU.', 'KhalidFaza-100x100.jpg'],
                ['Ahmed Mohammed Osman Ali', 'Director IT for Sudan & Ethiopia, Ericsson AB- Branch Sudan.', 'Future University (formerly Computer Man College) is not just a University; it’s a way of life. You learn to see the real world with a broaden mind for its system allows you to easily adapt to the dynamic environment that fosters a culture of professional growth.', 'Ahmed-Mohammed-Osman-Ali-100x100.jpg'],
                ['Amar Hamdi', 'IT Manager, On Target Consulting Dubai, UAE.', 'Future University, as we knew it back then as Computer Man College, gave me so much in many ways.', 'Amar-Hamdi-100x100.jpg'],
            ];
            DB::table('testimonials')->insert(array_map(fn ($r, $i) => [
                'name' => $r[0], 'position' => $r[1], 'quote' => $r[2], 'photo' => 'storage/fu_alumni/' . $r[3],
                'sort_order' => ($i + 1) * 10, 'is_visible' => true, 'created_at' => $now, 'updated_at' => $now,
            ], $rows, array_keys($rows)));
        }

        foreach (['fu_news', 'fu_events'] as $table) {
            if (Schema::hasTable($table) && !Schema::hasColumn($table, 'home_order')) {
                Schema::table($table, function (Blueprint $t) {
                    // Empty = by date. 1 shows first on the home page, then 2, ...
                    $t->unsignedSmallInteger('home_order')->nullable();
                });
            }
        }
    }

    public function down()
    {
        foreach (['fu_news', 'fu_events'] as $table) {
            if (Schema::hasColumn($table, 'home_order')) {
                Schema::table($table, fn (Blueprint $t) => $t->dropColumn('home_order'));
            }
        }
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('home_slides');
    }
};
