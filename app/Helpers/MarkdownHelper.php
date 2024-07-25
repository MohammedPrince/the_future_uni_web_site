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

        $converter = new CommonMarkConverter($environment);
        return $converter->convertToHtml($markdown);
    }
}