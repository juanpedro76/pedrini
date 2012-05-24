<?php

function parse_twitter($t) {    // link URLs
    $t = " ".preg_replace( "/(([[:alnum:]]+:\/\/)|www\.)([^[:space:]]*)". "([[:alnum:]#?\/&amp;=])/i", "<a href=\"\\1\\3\\4\" target=\"_blank\">".
        "\\1\\3\\4</a>", $t);

    // link mailtos
    $t = preg_replace( "/(([a-z0-9_]|\\-|\\.)+@([^[:space:]]*)".
        "([[:alnum:]-]))/i", "<a href=\"mailto:\\1\">\\1</a>", $t);

    //link twitter users
    $t = preg_replace( "/ +@([a-z0-9_]*) ?/i", " <a href=\"http://twitter.com/\\1\" target=\"_blank\">@\\1</a> ", $t);

    //link twitter arguments
    $t = preg_replace( "/ #([a-z0-9_]*) ?/i", " <a href=\"?var=\\1\">#\\1</a> ", $t);

    // truncates long urls that can cause display problems (optional)
    $t = preg_replace("/>(([[:alnum:]]+:\/\/)|www\.)([^[:space:]]".
        "{30,40})([^[:space:]]*)([^[:space:]]{10,20})([[:alnum:]#?\/&amp;=])".
        "</", ">\\3...\\5\\6<", $t);
    return trim($t);
}

?>

