<?PHP

//cite http://www.html-form-guide.com/php-form/php-registration-form.html
//cite http://www.html-form-guide.com/php-form/php-login-form.html
require_once("include/main.php");

$main = new Main();

$main->SetWebsiteName('soa');
$main->SetAdminEmail('elkingtonevo@gmail.com');

$main->InitDB(/*hostname*/'localhost',
                      /*username*/'root',
                      /*password*/'',
                      /*database name*/'soa',
                      /*table name*/'users');

$main->SetRandomKey('qSRcVS6DrTzrPvr');

?>