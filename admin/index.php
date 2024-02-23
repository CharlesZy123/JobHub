<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
   header("Location: login");
} elseif(isset($_SESSION['jobhub'])) {
   header("Location: redirect");
} else {
   header("Location: dashboard");
}
