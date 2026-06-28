<?php
/**
 * Yibera icon mark (inline SVG) — two interlocking ribbons forming the heart.
 * Params (set before include):
 *   $variant  'green' (default, for light backgrounds) | 'white' (for green/dark)
 *   $iconH    Tailwind height class for the icon, default 'h-9'
 */
$lmVariant = $variant ?? 'green';
$lmH       = $iconH   ?? 'h-9';
$lmStroke  = $lmVariant === 'white' ? '#ffffff' : '#2f7d57';
?>
<svg class="<?= $lmH ?> w-auto shrink-0" viewBox="0 0 100 100" fill="none" aria-hidden="true">
    <path d="M49 31 C45 21 31 16 22 25 C13 34 15 51 27 62 C34 69 42 76 53 81" fill="none" stroke="<?= $lmStroke ?>" stroke-width="12" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M51 31 C55 21 69 16 78 25 C87 34 85 51 73 62 C66 69 58 76 47 81" fill="none" stroke="<?= $lmStroke ?>" stroke-width="12" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
