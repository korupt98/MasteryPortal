<?php
error_reporting(-1);
//First Row
if(($percentover3>="100") AND ($percentover4>="100")){
$convertedgrade="100";
}
else if(($percentover3>="100") AND ($percentover4>="90") AND ($percentover4<"100")){
$convertedgrade="96";
}
else if(($percentover3>="100") AND ($percentover4>="80") AND ($percentover4<"90")){
$convertedgrade="92";
}
else if(($percentover3>="100") AND ($percentover4>="70") AND ($percentover4<"80")){
$convertedgrade="90";
}
else if(($percentover3>="100") AND ($percentover4>="60") AND ($percentover4<"70")){
$convertedgrade="89";
}
else if(($percentover3>="100") AND ($percentover4>="50") AND ($percentover4<"60")){
$convertedgrade="88";
}
else if(($percentover3>="100") AND ($percentover4>="40") AND ($percentover4<"50")){
$convertedgrade="87";
}
else if(($percentover3>="100") AND ($percentover4>="30") AND ($percentover4<"40")){
$convertedgrade="83";
}
else if(($percentover3>="100") AND ($percentover4>="20") AND ($percentover4<"30")){
$convertedgrade="82";
}
else if(($percentover3>="100") AND ($percentover4>="10") AND ($percentover4<"20")){
$convertedgrade="81";
}
else if(($percentover3>="100") AND ($percentover4<"10")){
$convertedgrade="80";
}

//Second Row
else if(($percentover3>="95") AND ($percentover3<"100") AND ($percentover4=="100")){
$convertedgrade="95";
}
else if(($percentover3>="95") AND ($percentover3<"100") AND ($percentover4>="90") AND ($percentover4<"100")){
$convertedgrade="93";
}
else if(($percentover3>="95") AND ($percentover3<"100") AND ($percentover4>="80") AND ($percentover4<"90")){
$convertedgrade="91";
}
else if(($percentover3>="95") AND ($percentover3<"100") AND ($percentover4>="70") AND ($percentover4<"80")){
$convertedgrade="89";
}
else if(($percentover3>="95") AND ($percentover3<"100") AND ($percentover4>="60") AND ($percentover4<"70")){
$convertedgrade="87";
}
else if(($percentover3>="95") AND ($percentover3<"100") AND ($percentover4>="50") AND ($percentover4<"60")){
$convertedgrade="86";
}
else if(($percentover3>="95") AND ($percentover3<"100") AND ($percentover4>="40") AND ($percentover4<"50")){
$convertedgrade="85";
}
else if(($percentover3>="95") AND ($percentover3<"100") AND ($percentover4>="30") AND ($percentover4<"40")){
$convertedgrade="82";
}
else if(($percentover3>="95") AND ($percentover3<"100") AND ($percentover4>="20") AND ($percentover4<"30")){
$convertedgrade="80";
}
else if(($percentover3>="95") AND ($percentover3<"100") AND ($percentover4>="10") AND ($percentover4<"20")){
$convertedgrade="78";
}
else if(($percentover3>="95") AND ($percentover3<"100") AND ($percentover4<"10")){
$convertedgrade="78";
}


//Third Row
else if(($percentover3>="90") AND ($percentover3<"95") AND ($percentover4=="100")){
$convertedgrade="90";
}
else if(($percentover3>="90") AND ($percentover3<"95") AND ($percentover4>="90") AND ($percentover4<"100")){
$convertedgrade="88";
}
else if(($percentover3>="90") AND ($percentover3<"95") AND ($percentover4>="80") AND ($percentover4<"90")){
$convertedgrade="86";
}
else if(($percentover3>="90") AND ($percentover3<"95") AND ($percentover4>="70") AND ($percentover4<"80")){
$convertedgrade="85";
}
else if(($percentover3>="90") AND ($percentover3<"95") AND ($percentover4>="60") AND ($percentover4<"70")){
$convertedgrade="84";
}
else if(($percentover3>="90") AND ($percentover3<"95") AND ($percentover4>="50") AND ($percentover4<"60")){
$convertedgrade="83";
}
else if(($percentover3>="90") AND ($percentover3<"95") AND ($percentover4>="40") AND ($percentover4<"50")){
$convertedgrade="82";
}
else if(($percentover3>="90") AND ($percentover3<"95") AND ($percentover4>="30") AND ($percentover4<"40")){
$convertedgrade="80";
}
else if(($percentover3>="90") AND ($percentover3<"95") AND ($percentover4>="20") AND ($percentover4<"30")){
$convertedgrade="77";
}
else if(($percentover3>="90") AND ($percentover3<"95") AND ($percentover4>="10") AND ($percentover4<"20")){
$convertedgrade="76";
}
else if(($percentover3>="90") AND ($percentover3<"95") AND ($percentover4<"10")){
$convertedgrade="76";
}

//Fourth Row
else if(($percentover3>="85") AND ($percentover3<"90") AND ($percentover4=="100")){
$convertedgrade="85";
}
else if(($percentover3>="85") AND ($percentover3<"90") AND ($percentover4>="90") AND ($percentover4<"100")){
$convertedgrade="84";
}
else if(($percentover3>="85") AND ($percentover3<"90") AND ($percentover4>="80") AND ($percentover4<"90")){
$convertedgrade="84";
}
else if(($percentover3>="85") AND ($percentover3<"90") AND ($percentover4>="70") AND ($percentover4<"80")){
$convertedgrade="81";
}
else if(($percentover3>="85") AND ($percentover3<"90") AND ($percentover4>="60") AND ($percentover4<"70")){
$convertedgrade="81";
}
else if(($percentover3>="85") AND ($percentover3<"90") AND ($percentover4>="50") AND ($percentover4<"60")){
$convertedgrade="80";
}
else if(($percentover3>="85") AND ($percentover3<"90") AND ($percentover4>="40") AND ($percentover4<"50")){
$convertedgrade="79";
}
else if(($percentover3>="85") AND ($percentover3<"90") AND ($percentover4>="30") AND ($percentover4<"40")){
$convertedgrade="78";
}
else if(($percentover3>="85") AND ($percentover3<"90") AND ($percentover4>="20") AND ($percentover4<"30")){
$convertedgrade="74";
}
else if(($percentover3>="85") AND ($percentover3<"90") AND ($percentover4>="10") AND ($percentover4<"20")){
$convertedgrade="74";
}
else if(($percentover3>="85") AND ($percentover3<"90") AND ($percentover4<"10")){
$convertedgrade="74";
}

//Fifth Row
else if(($percentover3>="80") AND ($percentover3<"85") AND ($percentover4=="100")){
$convertedgrade="80";
}
else if(($percentover3>="80") AND ($percentover3<"85") AND ($percentover4>="90") AND ($percentover4<"100")){
$convertedgrade="79";
}
else if(($percentover3>="80") AND ($percentover3<"85") AND ($percentover4>="80") AND ($percentover4<"90")){
$convertedgrade="78";
}
else if(($percentover3>="80") AND ($percentover3<"85") AND ($percentover4>="70") AND ($percentover4<"80")){
$convertedgrade="90";
}
else if(($percentover3>="80") AND ($percentover3<"85") AND ($percentover4>="60") AND ($percentover4<"70")){
$convertedgrade="89";
}
else if(($percentover3>="80") AND ($percentover3<"85") AND ($percentover4>="50") AND ($percentover4<"60")){
$convertedgrade="88";
}
else if(($percentover3>="80") AND ($percentover3<"85") AND ($percentover4>="40") AND ($percentover4<"50")){
$convertedgrade="87";
}
else if(($percentover3>="80") AND ($percentover3<"85") AND ($percentover4>="30") AND ($percentover4<"40")){
$convertedgrade="83";
}
else if(($percentover3>="80") AND ($percentover3<"85") AND ($percentover4>="20") AND ($percentover4<"30")){
$convertedgrade="82";
}
else if(($percentover3>="80") AND ($percentover3<"85") AND ($percentover4>="10") AND ($percentover4<"20")){
$convertedgrade="72";
}
else if(($percentover3>="80") AND ($percentover3<"85") AND ($percentover4<"10")){
$convertedgrade="72";
}

//Sixth Row
else if(($percentover3>="75") AND ($percentover3<"80") AND ($percentover4=="100")){
$convertedgrade="75";
}
else if(($percentover3>="75") AND ($percentover3<"80") AND ($percentover4>="90") AND ($percentover4<"100")){
$convertedgrade="74";
}
else if(($percentover3>="75") AND ($percentover3<"80") AND ($percentover4>="80") AND ($percentover4<"90")){
$convertedgrade="74";
}
else if(($percentover3>="75") AND ($percentover3<"80") AND ($percentover4>="70") AND ($percentover4<"80")){
$convertedgrade="73";
}
else if(($percentover3>="75") AND ($percentover3<"80") AND ($percentover4>="60") AND ($percentover4<"70")){
$convertedgrade="73";
}
else if(($percentover3>="75") AND ($percentover3<"80") AND ($percentover4>="50") AND ($percentover4<"60")){
$convertedgrade="72";
}
else if(($percentover3>="75") AND ($percentover3<"80") AND ($percentover4>="40") AND ($percentover4<"50")){
$convertedgrade="72";
}
else if(($percentover3>="75") AND ($percentover3<"80") AND ($percentover4>="30") AND ($percentover4<"40")){
$convertedgrade="71";
}
else if(($percentover3>="75") AND ($percentover3<"80") AND ($percentover4>="20") AND ($percentover4<"30")){
$convertedgrade="71";
}
else if(($percentover3>="75") AND ($percentover3<"80") AND ($percentover4>="10") AND ($percentover4<"20")){
$convertedgrade="70";
}
else if(($percentover3>="75") AND ($percentover3<"80") AND ($percentover4<"10")){
$convertedgrade="70";
}


//Seventh Row
else if(($percentover3>="70") AND ($percentover3<"75") AND ($percentover4=="100")){
$convertedgrade="73";
}
else if(($percentover3>="70") AND ($percentover3<"75") AND ($percentover4>="90") AND ($percentover4<"100")){
$convertedgrade="72";
}
else if(($percentover3>="70") AND ($percentover3<"75") AND ($percentover4>="80") AND ($percentover4<"90")){
$convertedgrade="71";
}
else if(($percentover3>="70") AND ($percentover3<"75") AND ($percentover4>="70") AND ($percentover4<"80")){
$convertedgrade="71";
}
else if(($percentover3>="70") AND ($percentover3<"75") AND ($percentover4>="60") AND ($percentover4<"70")){
$convertedgrade="70";
}
else if(($percentover3>="70") AND ($percentover3<"75") AND ($percentover4>="50") AND ($percentover4<"60")){
$convertedgrade="70";
}
else if(($percentover3>="70") AND ($percentover3<"75") AND ($percentover4>="40") AND ($percentover4<"50")){
$convertedgrade="69";
}
else if(($percentover3>="70") AND ($percentover3<"75") AND ($percentover4>="30") AND ($percentover4<"40")){
$convertedgrade="69";
}
else if(($percentover3>="70") AND ($percentover3<"75") AND ($percentover4>="20") AND ($percentover4<"30")){
$convertedgrade="68";
}
else if(($percentover3>="70") AND ($percentover3<"75") AND ($percentover4>="10") AND ($percentover4<"20")){
$convertedgrade="68";
}
else if(($percentover3>="70") AND ($percentover3<"75") AND ($percentover4<"10")){
$convertedgrade="68";
}


//Eighth Row
else if(($percentover3>="65") AND ($percentover3<"70") AND ($percentover4=="100")){
$convertedgrade="70";
}
else if(($percentover3>="65") AND ($percentover3<"70") AND ($percentover4>="90") AND ($percentover4<"100")){
$convertedgrade="69";
}
else if(($percentover3>="65") AND ($percentover3<"70") AND ($percentover4>="80") AND ($percentover4<"90")){
$convertedgrade="69";
}
else if(($percentover3>="65") AND ($percentover3<"70") AND ($percentover4>="70") AND ($percentover4<"80")){
$convertedgrade="69";
}
else if(($percentover3>="65") AND ($percentover3<"70") AND ($percentover4>="60") AND ($percentover4<"70")){
$convertedgrade="68";
}
else if(($percentover3>="65") AND ($percentover3<"70") AND ($percentover4>="50") AND ($percentover4<"60")){
$convertedgrade="68";
}
else if(($percentover3>="65") AND ($percentover3<"70") AND ($percentover4>="40") AND ($percentover4<"50")){
$convertedgrade="67";
}
else if(($percentover3>="65") AND ($percentover3<"70") AND ($percentover4>="30") AND ($percentover4<"40")){
$convertedgrade="67";
}
else if(($percentover3>="65") AND ($percentover3<"70") AND ($percentover4>="20") AND ($percentover4<"30")){
$convertedgrade="66";
}
else if(($percentover3>="65") AND ($percentover3<"70") AND ($percentover4>="10") AND ($percentover4<"20")){
$convertedgrade="65";
}
else if(($percentover3>="65") AND ($percentover3<"70") AND ($percentover4<"10")){
$convertedgrade="65";
}

else{$convertedgrade="55";}
?>