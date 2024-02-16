<?php
function echoActiveClass($requestUri)
{
    $current_page = basename($_SERVER['REQUEST_URI']);

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
      <a class="navbar-brand text-brand" href="index">Job <span class="color-b">Hunt</span></a>

      <div class="navbar-collapse collapse" style="justify-content: right;" id="navbarDefault">
         <ul class="navbar-nav ml-auto">
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
         </ul>
      </div>
   </div>
</nav>