<?php
function echoActiveClass($requestUri)
{
   $current_page = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

   if ($current_page == $requestUri) {
      echo 'active';
   }
}
?>

<nav class="navbar navbar-default navbar-trans navbar-expand-sm fixed-top">
   <div class="container mt-2 mb-1">
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
         <span></span>
         <span></span>
         <span></span>
      </button>
      <a class="h3" href="../index.php">Job<span class="color-b">Hub</span></a>

      <div class="navbar-collapse collapse" style="justify-content: right;" id="navbarDefault">
         <ul class="navbar-nav ml-auto">
            <?php if (!isset($_SESSION['user_id'])) { ?>
               <li class="nav-item pl-2 <?php echoActiveClass('index'); ?>">
                  <a class="nav-link" href="index">Home</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link pl-2 <?php echoActiveClass('about'); ?>" href="about">About</a>
               </li>

               <li class="nav-item">
                  <a class="nav-link pl-2 <?php echoActiveClass('contact'); ?>" href="contact">Contact</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link pl-2 <?php echoActiveClass('login'); ?>" href="login">Login</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link pl-2 <?php echoActiveClass('register'); ?>" href="register">Register</a>
               </li>
            <?php } else { ?>
               <li class="nav-item">
                  <a class="nav-link pl-2 <?php echoActiveClass('dashboard'); ?>" href="../user/dashboard">Home</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link pl-2" href="#" role="button" data-toggle="modal" data-target="#modal-logout">
                     <i class="fas fa-sign-out-alt"></i>&nbsp;Log Out</a>
                  </a>
               </li>
            <?php } ?>
         </ul>
      </div>
   </div>
</nav>