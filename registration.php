<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['password-repeat'];

   if (!strpos($email, '@')) {
    $response = array('status' => 'error', 'message' => 'Email должен содержать символ @');
    echo json_encode($response);
    exit;
  }

   if ($password !== $confirm_password) {
    $response = array('status' => 'error', 'message' => 'Пароли не совпадают');
    echo json_encode($response);
    exit;
  }

   $users = array(
    array('id' => 1, 'name' => 'John', 'email' => 'john@example.com', 'password' => '123456'),
    array('id' => 2, 'name' => 'Mary', 'email' => 'mary@example.com', 'password' => 'qwerty')
  );

   foreach ($users as $user) {
    if ($user['email'] === $email) {
      $response = array('status' => 'error', 'message' => 'Пользователь с таким email уже существует');
      echo json_encode($response);
      exit;
    }
  }

   $new_user = array(
    'id' => count($users) + 1,
    'name' => $name,
    'surname' => $surname,
    'email' => $email,
    'password' => $password
  );
  array_push($users, $new_user);

   $log_message = 'New user registered: ' . json_encode($new_user);
  error_log($log_message);

   $response = array('status' => 'success', 'message' => 'Регистрация прошла успешно');
  echo json_encode($response);
  exit;
}
?>
