<?php

    require_once __DIR__ . '/config.php';

    class API {
        function Select() {
            $db = new Connect;
            $user = array();
            $data = $db->prepare("SELECT * FROM  faculty ORDER BY id");
            $data->execute();

            while ($result = $data->fetch(PDO::FETCH_ASSOC)) {
                $user[] = array(
                    'id' => $result['id'],
                    'title' => $result['title'],
                    'first_name' => $result['first_name_th'],
                    'last_name' => $result['last_name_th'],
                );
            }

            return json_encode($user);
        }

        function Update() {
            $db = new Connect;
            $user = array();
            $data = $db->prepare("UPDATE * FROM  faculty ORDER BY id");
            $data->execute();

            while ($result = $data->fetch(PDO::FETCH_ASSOC)) {
                $user[] = array(
                    'id' => $result['id'],
                    'title' => $result['title'],
                    'first_name' => $result['first_name_th'],
                    'last_name' => $result['last_name_th'],
                );
            }

            return json_encode($user);
        }
    }

    $API = new API;
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    echo $API->Select();

?>