<?php

// XSS対策用関数
function h ($value) {
    return htmlspecialchars($value,ENT_QUOTES);
}




?>