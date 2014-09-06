<?  
    session_start();
    /* for testing: to refresh the session and cookie
    setCookie('CCBagName',"", time()-3600);
    setCookie('CCBagQty',"", time()-3600);
    unset($_SESSION['CCBagQty']);
    unset($_SESSION['CCBagName']);
    */
    
    //if cookies are not set, create ones
    if(!isSet($_COOKIE['CCBagQty']) && !isSet($_COOKIE['CCBagName'])){
        $temp = md5($_SERVER['REMOTE_ADDR']);
        setCookie('CCBagName', $temp, time()+3600*24*7);
        setCookie('CCBagQty', 0, time()+3600*24*7);
    }
    //if sessions are not set, create ones
    if(!isSet($_SESSION['CCBagQty']) || !isSet($_SESSION['CCBagName'])){
        //if cookie set successfully, then assign cookie value to session
        if(isSet($_COOKIE['CCBagQty']) && isSet($_COOKIE['CCBagName'])){
            $_SESSION['CCBagQty'] = $_COOKIE['CCBagQty'];
            $_SESSION['CCBagName'] = $_COOKIE['CCBagName'];
        //else create sessions with initial value
        }else{
            $temp = md5($_SERVER['REMOTE_ADDR']);
            $_SESSION['CCBagName'] = $temp;
            $_SESSION['CCBagQty'] = 0;  
        }        
    }
?>