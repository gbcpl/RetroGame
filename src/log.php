<?php

    if(isset($_COOKIE['auth']) && !isset($_SESSION['connect'])) {
        //VARIABLE
        $secret = htmlspecialchars($_COOKIE['auth']);

        // VERIFIER

        $req = $db->prepare("SELECT count(*) as numberAccount FROM customer WHERE secret = ?");
        $req->execute(array($secret));

        while($user = $req->fetch() ) {
            if($user['numberAccount'] == 1){
                $reqUser = $db->prepare("SELECT * FROM customer WHERE secret = ?");
                $reqUser->execute(array($secret));

                while($userAccount = $reqUser->fetch()){

					$_SESSION['connect'] = 1;
					$_SESSION['mail'] = $userAccount['mail'];
                }
            }
        }
    }