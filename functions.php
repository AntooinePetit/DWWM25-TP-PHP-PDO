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
  require 'config/connect.php';
  $stmt = $pdo->prepare('INSERT INTO users (email_user, password_hash_user, last_name_user, first_name_user, role_user) VALUES (:email, :pass, :lastname, :firstname, "membre")');
  $stmt->execute([
    "email" => $email,
    "pass" => $hashedPassword,
    "lastname" => $lastName,
    "firstname" => $firstName
  ]);

  return $stmt->rowCount();
}

/**
 * Checks if a user with the specified email already exists in the database.
 *
 * @param string $email The email address to check for existence.
 * @return bool Returns true if a user with the given email exists, false otherwise.
 */
function verifyExistingUser($email){
  require 'config/connect.php';
  $stmt = $pdo->prepare('SELECT * FROM users WHERE email_user = :email');
  $stmt->execute(["email" => $email]);

  return ($stmt->rowCount() >= 1) ? true : false;
}