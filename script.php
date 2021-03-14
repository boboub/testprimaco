<?php
try {
    $connect = new PDO('mysql:host=localhost;dbname=test_primaco', "root", "root");
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

$received_data = json_decode(file_get_contents("php://input"));
$data = array();

//Recuperation des utilisateurs de l'API RESTfull
if ($received_data->action == 'getUsers') {
    $list_users = json_decode(file_get_contents("https://jsonplaceholder.typicode.com/users"));
    $query = "
     INSERT INTO users 
     ( name ,username ,email ,addressstreet ,addresssuite ,addresscity ,addresszipcode ) 
     VALUES (?,?,?,?,?,?,?)
     ";

    $connect->beginTransaction();
    $stmt = $connect->prepare($query);

    foreach ($list_users as $user) {
        $user_info = [$user->name, $user->username, $user->email, $user->address->street, $user->address->suite, $user->address->city, $user->address->zipcode];
        $stmt->execute($user_info);
    }

    $connect->commit();

    $users_result = [];
    foreach ($connect->query('SELECT * from users') as $row) {
        array_push($users_result, $row);
    }

    echo json_encode($users_result);

}

//Ajout d'un utilisateur à l'API RESTfull
if ($received_data->action == 'addUser') {

    $url = "https://jsonplaceholder.typicode.com/users";
    $data = array('name' => 'Jean', 'username' => 'jeanusername', 'email'=>"jeanemail@gmail.com");

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    echo json_encode($result);
}

?>
