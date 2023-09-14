<?php
require('db_connection.php');

$action = $_POST['action'];

if ($action == "register") {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $passHash = password_hash($password, PASSWORD_DEFAULT);


    $sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";

    $checkUser = mysqli_query($connection, $sql);

    if ($checkUser && $checkUser->num_rows == 0) {

        $sql = "INSERT INTO users (name, username, email, password) VALUES ('$name' , '$username', '$email', '$passHash')";

        $result = mysqli_query($connection, $sql);

    }
    header('Location: ' . 'login.php');
    die;
}

if ($action == "login") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * /* users.username, users.email, users.password */ FROM users WHERE (users.username = '$email' OR users.email = '$email')";

    $result = mysqli_query($connection, $sql);

    $checkUser = mysqli_fetch_assoc($result);

    $pwd_check = password_verify($password, $checkUser["password"]);

    if ($checkUser and $pwd_check) {
        $_SESSION['email'] = $email;
        unset($checkUser['password']);
        $_SESSION['user'] = $checkUser;

        header('Location: ' . 'profile.php');
        die;
    }
}

if ($action == "update_user") {

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $userID = $_SESSION['user']['id'];

    $sql = "SELECT * FROM users WHERE (id = $userID)";

    $result = mysqli_query($connection, $sql);

    if ($userID) {
        $sql = "UPDATE users SET name = '$name', surname = '$surname', email = '$email', phone = '$phone' WHERE id = '$userID'";

        $result = mysqli_query($connection, $sql);

        $sql = "SELECT id, name, username, surname, email, phone FROM users WHERE id = '$userID'";

        $result = mysqli_query($connection, $sql);

        $user = mysqli_fetch_assoc($result);

        $_SESSION['user'] = $user;

        header('Location: ' . 'profile.php');
        die;
    }
}

if ($action == "add_appointment") {

    $date = $_POST['date'];
    $reason = $_POST['reason'];
    $user_id = $_SESSION['user']['id'];
    $sql = "SELECT * FROM users WHERE (id = $user_id)";

    $result = mysqli_query($connection, $sql);

    if ($user_id) {

        $sql = "INSERT INTO appointments (user_id, date, reason) VALUES ('$user_id', '$date', '$reason')";

        $result = mysqli_query($connection, $sql);

        header('Location: ' . 'appointments.php');
        die;
    }

}

$getAppointments = function () use ($connection) {

    $user_id = $_SESSION['user']['id'];
    $user_admin = $_SESSION['user']['admin'];

    $sql = "SELECT * FROM users WHERE (id = $user_id)";

    if ($user_id) {
        $rows = [];

        $sql = "SELECT id, user_id, date, reason FROM appointments WHERE user_id = '$user_id'";

        $result = mysqli_query($connection, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        $_SESSION['appointments'] = $rows;
    }

};

$getProjects = function () use ($connection) {

    $user_id = $_SESSION['user']['id'];
    $user_admin = $_SESSION['user']['admin'];

    $sql = "SELECT * FROM users WHERE (id = $user_id)";

    if ($user_id) {
        $rows = [];

        $sql = "SELECT id, title, description, photo, completion_time FROM portfolio WHERE user_id = '$user_id'";

        $result = mysqli_query($connection, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        $_SESSION['projects'] = $rows;
    }

};

$getNewsIndex = function () use ($connection) {

    $user_id = $_SESSION['user']['id'];
    $user_admin = $_SESSION['user']['admin'];

    $sql = "SELECT * FROM users WHERE (id = $user_id)";


    $rows = [];

    $sql = "SELECT id, title, description FROM news ORDER BY id DESC LIMIT 5";

    $result = mysqli_query($connection, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    $_SESSION['news'] = $rows;


};

$getNews = function () use ($connection) {

    $user_id = $_SESSION['user']['id'];
    $user_admin = $_SESSION['user']['admin'];

    $sql = "SELECT * FROM users WHERE (id = $user_id)";

    if ($user_id) {
        $rows = [];

        $sql = "SELECT id, title, description FROM news ORDER BY id DESC";

        $result = mysqli_query($connection, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        $_SESSION['news'] = $rows;
    }

};


if ($action == "edit_appointment") {

    $date = $_POST['date'];
    $reason = $_POST['reason'];
    $user_id = $_SESSION['user']['id'];

    $sql = "SELECT * FROM users WHERE id = '$user_id'";

    $appointmentID = $_POST['appointmentID'];
    $result = mysqli_query($connection, $sql);

    $dateToday = new DateTime();
    $result = $dateToday->format('d/m/Y');
    $dateCheck = $result < $appointment['date'];

    if ($user_id) {

        if ($date < $dateCheck) {

            $sql = "UPDATE appointments SET date = '$date', reason = '$reason' WHERE id = '$appointmentID'";

            $result = mysqli_query($connection, $sql);

            header('Location: ' . 'appointments.php');
            die;

        } else {
            echo '<script>alert("Erro");</script>';

        }

    }

}


if ($action == "delete_appointment") {

    $user_id = $_SESSION['user']['id'];
    $sql = "SELECT * FROM users WHERE (id = $user_id)";

    $appointmentID = $_POST['appointmentID'];

    $result = mysqli_query($connection, $sql);

    if ($user_id) {

        $sql = "DELETE FROM appointments WHERE id = '$appointmentID'";

        $result = mysqli_query($connection, $sql);

        header('Location: ' . 'appointments.php');
        die;
    }

}

if ($action == "add_project") {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $photo = base64_encode(file_get_contents($_FILES['photo']['tmp_name']));
    $_SESSION['photo'] = $photo;
    $completionTime = $_POST['completionTime'];

    $user_id = $_SESSION['user']['id'];
    $sql = "SELECT * FROM users WHERE (id = $user_id)";

    $result = mysqli_query($connection, $sql);

    if ($user_id) {

        $sql = "INSERT INTO portfolio (user_id, title, description, photo, completion_time) VALUES ('$user_id', '$title', '$description', '$photo', '$completionTime')";

        $result = mysqli_query($connection, $sql);

        header('Location: ' . 'portfolio.php');
        die;
    }

}

if ($action == "edit_project") {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $user_id = $_SESSION['user']['id'];
    $completionTime = $_POST['completionTime'];


    $sql = "SELECT * FROM users WHERE id = '$user_id'";

    $projectID = $_POST['projectID'];
    $result = mysqli_query($connection, $sql);


    if ($user_id) {

        $sql = "UPDATE portfolio SET title = '$title', description = '$description', completion_time = '$completionTime' WHERE id = '$projectID'";

        $result = mysqli_query($connection, $sql);

        header('Location: ' . 'portfolio.php');
        die;
    }

}

if ($action == "delete_project") {

    $user_id = $_SESSION['user']['id'];
    $sql = "SELECT * FROM users WHERE (id = $user_id)";

    $projectID = $_POST['projectID'];

    $result = mysqli_query($connection, $sql);

    if ($user_id) {

        $sql = "DELETE FROM portfolio WHERE id = '$projectID'";

        $result = mysqli_query($connection, $sql);

        header('Location: ' . 'portfolio.php');
        die;
    }

}

if ($action == "add_new") {

    $title = $_POST['title'];
    $description = $_POST['description'];

    $user_id = $_SESSION['user']['id'];
    $sql = "SELECT * FROM users WHERE (id = $user_id)";

    $result = mysqli_query($connection, $sql);

    if ($user_id) {

        $sql = "INSERT INTO news (user_id, title, description) VALUES ('$user_id', '$title', '$description')";

        $result = mysqli_query($connection, $sql);

        header('Location: ' . 'news.php');
        die;
    }

}

if ($action == "edit_new") {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $user_id = $_SESSION['user']['id'];


    $sql = "SELECT * FROM users WHERE id = '$user_id'";

    $newID = $_POST['newID'];
    $result = mysqli_query($connection, $sql);


    if ($user_id) {

        $sql = "UPDATE news SET title = '$title', description = '$description' WHERE id = '$newID'";

        $result = mysqli_query($connection, $sql);

        header('Location: ' . 'news.php');
        die;
    }

}

if ($action == "delete_new") {

    $user_id = $_SESSION['user']['id'];
    $sql = "SELECT * FROM users WHERE (id = $user_id)";

    $newID = $_POST['newID'];

    $result = mysqli_query($connection, $sql);

    if ($user_id) {

        $sql = "DELETE FROM news WHERE id = '$newID'";

        $result = mysqli_query($connection, $sql);

        header('Location: ' . 'news.php');
        die;
    }

}

$getUsers = function () use ($connection) {

    $user_id = $_SESSION['user']['id'];
    $user_admin = $_SESSION['user']['admin'];

    if ($user_admin == 1) {
        $rows = [];

        $sql = "SELECT username FROM users";

        $result = mysqli_query($connection, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        $_SESSION['users'] = $rows;
    }

};






/* 

$_SESSION['otherUserUsername'] = $selected_option;



$getOtherUser = function () use ($connection) {

    $selected_option = $_POST['option_value'];
    $_SESSION['otherUserUsername'] = $selected_option;

    $user_id = $_SESSION['user']['id'];
    $user_admin = $_SESSION['user']['admin'];

    if ($user_admin == 1) {
        $rows = [];

        $sql = "SELECT id, name, surname, username, email, phone FROM users WHERE username = '" . $_SESSION['otherUserUsername'] . "'";

        $result = mysqli_query($connection, $sql);
        $_SESSION['teste'] = mysqli_fetch_assoc($result);
    }
}; */


$selected_option = $_POST['option_value'];
$_SESSION['teste1'] = $selected_option;
if ($action == "edit_other_user") {

    $selected_option = $_POST['option_value'];
    $username = $selected_option;
    $name = $_POST['otherUserName'];
    $surname = $_POST['otherUserSurname'];
    $email = $_POST['otherUserEmail'];
    $phone = $_POST['otherUserPhone'];

    $user_admin = $_SESSION['user']['admin'];

    $sql = "SELECT * FROM users WHERE (id = $userID)";

    $result = mysqli_query($connection, $sql);

    if ($userID) {
        $sql = "SELECT name, surname, email, phone FROM users WHERE username = '$username'";

        $result = mysqli_query($connection, $sql);
    }
}


if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: ' . 'login.php');
    die;
}