<?php
/**
 * Status Helper Functions
 * Provides utility functions for handling patient status display and styling
 */

/**
 * Get Tailwind CSS classes for patient status badges
 * 
 * @param string $status The patient status (pending, confirmed, completed, cancelled)
 * @return string Tailwind CSS classes for the status badge
 */
function getStatusBadgeClasses($status) {
    switch(strtolower($status)) {
        case 'pending':
            return 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200 border-yellow-200';
        case 'confirmed':
            return 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 border-green-200';
        case 'completed':
            return 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200 border-blue-200';
        case 'cancelled':
            return 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200 border-red-200';
        case 'active':
            return 'bg-primary-100 text-primary-800 dark:bg-primary-900 dark:text-primary-200 border-primary-200';
        case 'inactive':
            return 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200 border-gray-200';
        default:
            return 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200 border-gray-200';
    }
}

/**
 * Get icon class for patient status
 * 
 * @param string $status The patient status
 * @return string Font Awesome icon class
 */
function getStatusIcon($status) {
    switch(strtolower($status)) {
        case 'pending':
            return 'fas fa-clock';
        case 'confirmed':
            return 'fas fa-check-circle';
        case 'completed':
            return 'fas fa-flag-checkered';
        case 'cancelled':
            return 'fas fa-times-circle';
        case 'active':
            return 'fas fa-user-check';
        case 'inactive':
            return 'fas fa-user-slash';
        default:
            return 'fas fa-question-circle';
    }
}

/**
 * Get human-readable status text
 * 
 * @param string $status The patient status
 * @return string Formatted status text
 */
function getStatusText($status) {
    switch(strtolower($status)) {
        case 'pending':
            return 'Pending Review';
        case 'confirmed':
            return 'Confirmed';
        case 'completed':
            return 'Completed';
        case 'cancelled':
            return 'Cancelled';
        case 'active':
            return 'Active';
        case 'inactive':
            return 'Inactive';
        default:
            return ucfirst($status);
    }
}

/**
 * Render a complete status badge with icon and text
 * 
 * @param string $status The patient status
 * @param bool $showIcon Whether to show the status icon
 * @param string $size Size variant (sm, md, lg)
 * @return string Complete HTML for status badge
 */
function renderStatusBadge($status, $showIcon = true, $size = 'md') {
    $classes = getStatusBadgeClasses($status);
    $icon = getStatusIcon($status);
    $text = getStatusText($status);
    
    // Size variants
    $sizeClasses = '';
    switch($size) {
        case 'sm':
            $sizeClasses = 'px-2 py-1 text-xs';
            break;
        case 'lg':
            $sizeClasses = 'px-6 py-3 text-base';
            break;
        default: // md
            $sizeClasses = 'px-4 py-2 text-sm';
    }
    
    $iconHtml = $showIcon ? "<i class=\"{$icon} mr-2\"></i>" : '';
    
    return "<span class=\"{$sizeClasses} font-medium rounded-full border {$classes}\">{$iconHtml}{$text}</span>";
}

/**
 * Get priority level classes for urgent/priority status
 * 
 * @param string $priority The priority level (low, normal, high, urgent)
 * @return string Tailwind CSS classes for priority badges
 */
function getPriorityBadgeClasses($priority) {
    switch(strtolower($priority)) {
        case 'urgent':
            return 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200 border-red-200';
        case 'high':
            return 'bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-200 border-orange-200';
        case 'normal':
            return 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200 border-blue-200';
        case 'low':
            return 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200 border-gray-200';
        default:
            return 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200 border-gray-200';
    }
}
?>
