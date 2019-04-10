<?php

session_start();

// Destroying session's variables
session_unset();

// Destroying session
session_destroy();

// Redirecting user to the home page
header("Location: home");
