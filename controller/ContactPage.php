 <?php

 class ContactController extends Controller{
     
      function runBeforeAction() {

          if($_SESSION['has_submitted_the_form'] ?? 0 == 1 ) {

              $dbh = DatabaseConnection::getInstance();
              $dbc = $dbh->getConnection();

              $pageObj = new Page($dbc);
              $pageObj->findById(3);

              $variables['pageObj'] = $pageObj;


       
             $template = new Template('default');
             $template->view('static-page', $variables);
          // include 'view/contact/contact-us-already-contacted.html';  
              return false;
         }
             return true;
     }
     function defaultAction() {


         $dbh = DatabaseConnection::getInstance();
         $dbc = $dbh->getConnection();

         $pageObj = new Page($dbc);
         $pageObj->findById(4);

         $variables['pageObj'] = $pageObj;



       
             $template = new Template('default');
             $template->view('contact/contact-us', $variables);
          //include 'view/contact/contact-us.html';
     }
     
     function submitContactFormAction() {
        
          //validate
          //store
          //send email
    
         
         $_SESSION['has_submitted_the_form'] = 1;

         $dbh = DatabaseConnection::getInstance();
         $dbc = $dbh->getConnection();

         $pageObj = new Page($dbc);
         $pageObj->findById(5);

         $variables['pageObj'] = $pageObj;
       
             $template = new Template('default');
             $template->view('static-page', $variables);
    //include 'view/contact/contact-us-thank-you.html';
}
     
  
  
 }





  

?>