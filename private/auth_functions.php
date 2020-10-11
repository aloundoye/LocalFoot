<?php

  // Performs all actions necessary to log in an admin
  function log_in_admin($admin) {
  // Renerating the ID protects the admin from session fixation.
    session_regenerate_id();
    $_SESSION['admin_id'] = $admin['id'];
    $_SESSION['admin_last_login'] = time();
    $_SESSION['admin_email'] = $admin['email'];
    return true;
  }

  // Performs all actions necessary to log out an admin
  function log_out_admin() {
    unset($_SESSION['admin_id']);
    unset($_SESSION['admin_last_login']);
    unset($_SESSION['admin_email']);
    // session_destroy(); // optional: destroys the whole session
    return true;
  }


  // is_logged_in() contains all the logic for determining if a
  // request should be considered a "logged in" request or not.
  // It is the core of require_login() but it can also be called
  // on its own in other contexts (e.g. display one link if an admin
  // is logged in and display another link if they are not)
  function is_admin_logged_in() {
    // Having a admin_id in the session serves a dual-purpose:
    // - Its presence indicates the admin is logged in.
    // - Its value tells which admin for looking up their record.
    return isset($_SESSION['admin_id']);
  }

  // Call require_login() at the top of any page which needs to
  // require a valid login before granting acccess to the page.
  function require_admin_login() {
    if(!is_admin_logged_in()) {
      redirect_to(url_for('/admin/login.php'));
    } else {
      // Do nothing, let the rest of the page proceed
    }
  }
  // Performs all actions necessary to log in an admin
  function log_in_client($client) {
  // Renerating the ID protects the admin from session fixation.
    session_regenerate_id();
    $_SESSION['client_id'] = $client['id'];
    $_SESSION['client_last_login'] = time();
    $_SESSION['client_email'] = $client['email'];
    return true;
  }

  // Performs all actions necessary to log out an admin
  function log_out_client() {
    unset($_SESSION['client_id']);
    unset($_SESSION['client_last_login']);
    unset($_SESSION['client_email']);
    // session_destroy(); // optional: destroys the whole session
    return true;
  }


  // is_logged_in() contains all the logic for determining if a
  // request should be considered a "logged in" request or not.
  // It is the core of require_login() but it can also be called
  // on its own in other contexts (e.g. display one link if an admin
  // is logged in and display another link if they are not)
  function is_client_logged_in() {
    // Having a admin_id in the session serves a dual-purpose:
    // - Its presence indicates the admin is logged in.
    // - Its value tells which admin for looking up their record.
    return isset($_SESSION['client_id']);
  }

  // Call require_login() at the top of any page which needs to
  // require a valid login before granting acccess to the page.
  function require_client_login() {
    if(!is_client_logged_in()) {
      redirect_to(url_for('/login.php'));
    } else {
      // Do nothing, let the rest of the page proceed
    }
  }

?>
