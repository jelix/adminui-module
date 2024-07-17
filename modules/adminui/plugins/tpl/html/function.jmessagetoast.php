<?php
/**
 * @author      Laurent Jouanneau
 * @copyright   2024 Laurent Jouanneau
 * @link        https://jelix.org
 * @licence MIT
 */

/**
 * function plugin :  Display messages from jMessage as toast messages.
 */
function jtpl_function_html_jmessagetoast($tpl, $type = '')
{
    $classes = [
        "error" => "bg-danger",
        "warning" => "bg-warning",
        "notice" => "bg-info",
        "ok"  => "bg-success",
    ];

    // Get messages
    if ($type == '') {
        $messages = jMessage::getAll();
    } else {
        $messages = jMessage::get($type);

    }
    // Not messages, quit
    if (!$messages) {
        return;
    }

    echo '<ul class="jelix-toast-msg">';

    // Display messages
    if ($type == '') {
        foreach ($messages as $type_msg => $all_msg) {
            foreach ($all_msg as $msg) {
                echo '<li class="'.($classes[$type_msg] ?? 'bg-notice').'">'.htmlspecialchars($msg).'</li>';
            }
        }
    } else {
        $cssClass = $classes[$type] ?? 'bg-notice';
        foreach ($messages as $msg) {
            echo '<li class="'.$cssClass.'">'.htmlspecialchars($msg).'</li>';
        }
    }
    echo '</ul>';

    if ($type == '') {
        jMessage::clearAll();
    } else {
        jMessage::clear($type);
    }
}
