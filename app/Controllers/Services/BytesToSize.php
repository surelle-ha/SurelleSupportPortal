<?php
    function bytesToSize($bytes) {
        $sizes = array('B', 'KB', 'MB', 'GB', 'TB');
        if ($bytes == 0) return '0 B';
        $i = floor(log($bytes, 1024));
        return round($bytes / pow(1024, $i), 2) . ' ' . $sizes[$i];
    }
?>