<?php

function age_verification($age) {

    $verified = '';

    if ($age >= 21) {
        
        echo 'You may enter. ✅';

    }else {

        echo 'Not old enough. ⛔';

    }

}

