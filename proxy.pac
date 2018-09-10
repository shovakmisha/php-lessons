function FindProxyForURL(url, host) {

    //cdeploybegin : do not remove this line, do not edit this part
    if (host == "mustela.lxc") {return "PROXY shovak-Lenovo-ideapad-310-15IKB:80";}
    if (host == "fr.mustela.lxc") {return "PROXY shovak-Lenovo-ideapad-310-15IKB:80";}
    if (host == "cgn.lxc") {return "PROXY shovak-Lenovo-ideapad-310-15IKB:80";}
    if (host == "modyf-m2.lxc") {return "PROXY shovak-Lenovo-ideapad-310-15IKB:80";}
    if (host == "modyf.lxc") {return "PROXY shovak-Lenovo-ideapad-310-15IKB:80";}
    if (host == "pocketbook.lxc") {return "PROXY shovak-Lenovo-ideapad-310-15IKB:80";}
    //cdeployend : do not remove this line, you can edit now
    
    // Add custom configs here :

    // Default action 
    return "DIRECT";
}
