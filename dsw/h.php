<?php
file_put_contents('hm.txt',urldecode(file_get_contents("php://input"))."\n",FILE_APPEND);