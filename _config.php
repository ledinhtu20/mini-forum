<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'mini_forum');
$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die("Lỗi kết nối CSDL.");
mysql_set_charset('utf8', $connection);
$db = mysql_select_db(DB_DATABASE, $connection);

define('LEVEL_VISITOR', 6);
define('LEVEL_MEMBER', 4);
define('LEVEL_MODERATOR', 2);
define('LEVEL_ADMIN', 0);

define('MAX_NEW_ITEMS', 15); // Số bài viết mới
define('MAX_ITEMS_PER_PAGE', 5); // Số items (post, reply) trên 1 trang.
?>