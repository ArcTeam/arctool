function getTexture(s,a,l){
    var res = $("#risultato");
    if((l + 1.5*a) < 15){res.text('Sand');}
    else if((l + 1.5*a >= 15) && (l + 2*a < 30)){res.text('Loamy Sand');}
    else if((a >= 7 && a < 20) && (s > 52) && ((l + 2*a) >= 30) || (a < 7 && s < 50 && (s+2*a)>=30)){res.text('Sandy Loam');}
    else if((a >= 7 && a < 27) && (l >= 28 && l < 50) && (s <= 52)){res.text('Loam');}
    else if((l >= 50 && (a >= 12 && a < 27)) || ((l >= 50 && l < 80) && a < 12)){res.text('Silt Loam');}
    else if(l >= 80 && a < 12){res.text('Silt');}
    else if((a >= 20 && a < 35) && (l < 28) && (s > 45)){res.text('Sandy Clay Loam');}
    else if((a >= 27 && a < 40) && (s > 20 && s <= 45)){res.text('Clay Loam');}
    else if((a >= 27 && a < 40) && (s  <= 20)){res.text('Silty Clay Loam');}
    else if(a >= 35 && s > 45){res.text('Sandy Clay');}
    else if(a >= 40 && l >= 40){res.text('Silty Clay');}
    else if(a >= 40 && s <= 45 && l < 40){res.text('Clay');}
    else{res.text('Errore nel calcolo, riprova');}
}
