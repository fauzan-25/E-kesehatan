<?php
function setFlash($type, $message) {
    $_SESSION['flash'] = [
        'type' => $type,
        'message' => $message
    ];
}

function showFlash() {
    if (isset($_SESSION['flash'])) {
        $type = $_SESSION['flash']['type'];
        $message = $_SESSION['flash']['message'];

        $color = $type === 'success' ? '#d4edda' : '#f8d7da';
        $text = $type === 'success' ? '#155724' : '#721c24';

        echo "<div style='background:$color;color:$text;padding:10px;margin:10px 0;border-radius:5px;'>$message</div>";
        unset($_SESSION['flash']);
    }
}
?>
