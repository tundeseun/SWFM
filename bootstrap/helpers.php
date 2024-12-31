<?php

if ( ! function_exists('t')) {
    /**
     * Translate the given key using less verbose syntax.
     *
     * @example t('Hello, {0}', ['World'])
     */
    function t(
        string $key,
        array $replace = [],
        bool $md = false,
        ?string $locale = null,
    ): string|Illuminate\Contracts\Support\Htmlable {
        try {
            if (app()->isLocal() && ! blank($key)) {
                cache()->lock('updating-translations')->get(function () use ($key) {
                    $path = lang_path(config('app.fallback_locale').'.json');
                    $translations = json_decode(file_get_contents($path), true);
                    $translations[$key] ??= null;
                    file_put_contents($path, json_encode($translations, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
                });
            }

            $translation = app('translator')->get($key, $replace, $locale);

            foreach ($replace as $placeholder => $value) {
                $translation = str_replace('{'.$placeholder.'}', $value, $translation);
            }

            return $md ? new Illuminate\Support\HtmlString(str($translation)->markdown()) : $translation;
        } catch (Throwable) {
            return $key;
        }
    }
}