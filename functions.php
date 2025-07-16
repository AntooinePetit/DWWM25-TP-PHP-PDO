<?php

/**
 * Registers a new user in the database.
 *
 * Hashes the provided password and inserts a new user record into the 'users' table
 * with the specified email, last name, first name, and a default role of "membre".
 *
 * @param string $email      The user's email address.
 * @param string $password   The user's plain text password.
 * @param string $lastName   The user's last name.
 * @param string $firstName  The user's first name.
 *
 * @return int Returns the number of affected rows (should be 1 if successful).
 */
function signUp($email, $password, $lastName, $firstName){
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  require_once 'config/connect.php';
  $stmt = $pdo->prepare('INSERT INTO users (email_user, password_hash_user, last_name_user, first_name_user, role_user) VALUES (:email, :pass, :lastname, :firstname, "membre")');
  $stmt->execute([
    "email" => $email,
    "pass" => $hashedPassword,
    "lastname" => $lastName,
    "firstname" => $firstName
  ]);

  return $stmt->rowCount();
}