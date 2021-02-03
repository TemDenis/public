<?php
session_start();

define('ROOT_PATH', dirname('_FILE_') . DIRECTORY_SEPARATOR);
define('VIEW_PATH', ROOT_PATH .DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR);

require_once ROOT_PATH . 'src/Controller.php';
require_once ROOT_PATH . 'src/Template.php';
require_once ROOT_PATH . 'src/DatabaseConnection.php';
require_once ROOT_PATH . 'src/Entity.php';
require_once ROOT_PATH . 'src/Router.php';
require_once ROOT_PATH . 'model/Page.php';




/*Connect to a MYSQL database using driver invocation*/
DatabaseConnection::connect('localhost', 'darwin_cms','root', '');


//if /else logic
//$section = $_GET['section'] ?? $_POST['section'] ?? 'home';
//$action = $_GET['action'] ??  $_POST['action'] ?? 'default';



$action = $_GET['seo_name'] ?? 'home';

var_dump($_GET);


$dbh = DatabaseConnection::getInstance();
$dbc = $dbh->getConnection();

$router = new Router($dbc);
//PLEASE SIR THIS COMMENTED LINE BELOW WORKS WELL AT THIS LEVEL BUT INSTEAD OF $CATION AS
// IN YOUR CODE IT DOES NT WORK FOR ME , BUT WHEN I PUT THE 'about_us' AFTER THE 'pretty_url' IN THE
//ROUTER->FINEBY() METHOD IT WORKS


//$router->findBy('pretty_url', 'about_us');

$router->findBy('pretty_url', $action);
  var_dump($router);


$action = $router->action != '' ? $router->action : 'default';


if( $router->module == 'page') {
 include ROOT_PATH . 'controller/AboutUsPage.php';
    $aboutUsController = new  AboutUsController();
    $aboutUsController->runAction($action);
    
} else if($section == 'contact') {
    include ROOT_PATH . 'controller/ContactPage.php';
      $contactController = new ContactController();
        $contactController->runAction($action);

    
}else {
include ROOT_PATH . 'controller/HomePage.php';
    $homePageController = new HomePageController();
    $homePageController->runAction($action);
}


//email: avdyl.krasniqi@studentet.uni-pr.edu
//pass: TemDenis1.Cameroon


























//
//class Entity {
//    protected $tableName;
//    protected $fields;
//
//    public function findBy($fieldName, $fieldValue) {
//
//        $sql = "SELECT * FROM " . $this->tableName . " WHERE " .$fieldValue . " = :value";
//        $stmt = $this->dbc->prepare($sql);
//        $stmt->execute(['value'=> $fieldValue]);
//        $pageData = $stmt->fetch();
//
//    }
//
//    public function setValues($values) {
//
//        foreach ($this->fields as $fieldName) {
//            $this->$fieldName = $values[$fieldName];
//        }
//
//    }
//
//}
