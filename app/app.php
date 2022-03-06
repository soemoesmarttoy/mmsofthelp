<?php

define('APP_PATH', dirname(__FILE__) . '/../');
require('config.php');
require('functions.php');
require('category/categorydata.class.php');
require('category/filedataprovider.class.php');
require('category/mysqlcategoryprovider.class.php');
require('user/userdata.class.php');
require('user/mysqluserprovider.class.php');
require('company/companydata.class.php');
require('company/mysqlcompanyprovider.class.php');
require('post/postdata.class.php');
require('post/mysqlpostprovider.class.php');

include('translations.php');


CategoryData:: initialize(new MySqlCategoryProvider(CONFIG['db']));
UserData:: initialize(new MySqlUserProvider(CONFIG['db']));
CompanyData:: initialize(new MySqlCompanyProvider(CONFIG['db']));
PostData:: initialize(new MySqlPostProvider(CONFIG['db']));

?>