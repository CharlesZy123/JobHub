<?php
session_start();
if (!isset($_SESSION['user_id'])) {
   header("Location: ../welcome/login");
} else {
   header("Location: dashboard");
}
