<?php

namespace App\Services;

class ContentFilterService
{
    public function filterContent(string $content): string
    {
        $badwords = config('filter.bad_words', []);
        foreach ($badwords as $badword)
        {
            $content = str_ireplace($badword, '***', $content);
        }
          return trim($content);

    }
    
}