<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

/**
 * Site-wide settings saved from the admin panel (Site Settings).
 * Read through Setting::get(); the values are cached until the next save.
 * Defaults live in config/site.php.
 */
class Setting extends Model
{
    public $table = 'site_settings';
    protected $primaryKey = 'key';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['key', 'value'];

    private const CACHE_KEY = 'site_settings';

    private static ?array $loaded = null;

    /** All settings, saved values over the defaults. */
    public static function allValues(): array
    {
        if (self::$loaded === null) {
            // rescue(): before the migration has run (or if the database is down)
            // the site keeps working with the defaults.
            $saved = rescue(
                fn () => Cache::rememberForever(self::CACHE_KEY, fn () => self::query()->pluck('value', 'key')->all()),
                [],
                false
            );
            self::$loaded = array_merge(config('site.defaults', []), array_filter($saved, fn ($v) => $v !== null));
        }

        return self::$loaded;
    }

    public static function get(string $key, $default = null)
    {
        return self::allValues()[$key] ?? $default;
    }

    public static function enabled(string $key): bool
    {
        return (string) self::get($key, '0') === '1';
    }

    /** Saves several settings at once. */
    public static function putMany(array $values): void
    {
        foreach ($values as $key => $value) {
            self::query()->updateOrCreate(['key' => $key], ['value' => $value === null ? '' : (string) $value]);
        }
        self::forget();
    }

    public static function forget(): void
    {
        self::$loaded = null;
        rescue(fn () => Cache::forget(self::CACHE_KEY), null, false);
    }
}
