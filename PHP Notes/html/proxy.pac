function FindProxyForURL(url, host) {

    //cdeploybegin : do not remove this line, do not edit this part
    if (host == "tfl-internet.lxc") {return "PROXY shovak-Extensa-2511:80";}
    if (host == "50five.lxc") {return "PROXY shovak-Extensa-2511:80";}
    if (host == "modyf-m2.lxc") {return "PROXY shovak-Extensa-2511:80";}
    if (host == "mustela.lxc") {return "PROXY shovak-Extensa-2511:80";}
    if (host == "fr.mustela.lxc") {return "PROXY shovak-Extensa-2511:80";}
    //cdeployend : do not remove this line, you can edit now
    
    // Add custom configs here :

    // Default action 
    return "DIRECT";
}
