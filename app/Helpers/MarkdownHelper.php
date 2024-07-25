<?php

namespace App\Helpers;

use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;

class MarkdownHelper
{
    public static function render(string $markdown, array $extensions = []): string
    {
        $environment = new Environment();

        foreach ($extensions as $extension) {
            if ($extension instanceof ExtensionInterface) {
                $environment->addExtension($extension);
            }
        }

        $config = [
            'html_input' => 'allow',
            'allow_unsafe_links' => false,
        ];

        $converter = new CommonMarkConverter($config, $environment);
        return $converter->convertToHtml($markdown);
    }
}