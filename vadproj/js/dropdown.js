 
 //ProductDropDownFunction

 function productdropdownlist(listindex)
 {
 
document.details.products.options.length = 0;
 switch (listindex)
 {
 
 case "Claiborne" :
 document.details.products.options[0]=new Option("","");
 document.details.products.options[1]=new Option("Atlantis","Atlantis");
 document.details.products.options[2]=new Option("Cobra","Cobra");
 document.details.products.options[3]=new Option("Paris","Paris");
 document.details.products.options[4]=new Option("Palazzo","Palazzo");
 document.details.products.options[5]=new Option("Yankees","Yankess");
 
 
 break;
 
 case "Homestretch" :
 document.details.products.options[0]=new Option("","");
 document.details.products.options[1]=new Option("Callisto","Callisto");
 document.details.products.options[2]=new Option("Camaro","Camaro");
 document.details.products.options[3]=new Option("Clover","Clover");
 document.details.products.options[4]=new Option("Hickory","Hickory");
 document.details.products.options[5]=new Option("Mirage","Mirage");
 document.details.products.options[6]=new Option("New York","NewYork");
 document.details.products.options[7]=new Option("Topaz","Topaz");
 document.details.products.options[8]=new Option("Torquoise","Torquoise");
 document.details.products.options[9]=new Option("Viking","Viking");
 
 
 break;
 
 case "Predo" :
 document.details.products.options[0]=new Option("","");
 document.details.products.options[1]=new Option("Jib","Jib");
 document.details.products.options[2]=new Option("Spinnaker","Spinnaker");
 
 break;

 case "Pride" :
 document.details.products.options[0]=new Option("","");
 document.details.products.options[1]=new Option("Bradshaw","Bradshaw");
 document.details.products.options[2]=new Option("Flamingo","Flamingo");
 document.details.products.options[3]=new Option("Joplin L,M,H","JoplinL,M,H");
 document.details.products.options[4]=new Option("Longbow H","LongbowH");
 document.details.products.options[5]=new Option("Manning","Manning");
 document.details.products.options[6]=new Option("Striker","Striker");

 
 break;

 case "WinnerCircle" :
 document.details.products.options[0]=new Option("","");
 document.details.products.options[1]=new Option("Denali","Denali");
 document.details.products.options[2]=new Option("Voyager","Voyager");
 document.details.products.options[3]=new Option("Pirate","Pirate");
 document.details.products.options[4]=new Option("Thunderball","Thunderball");
 document.details.products.options[5]=new Option("Montego (Jamaica)","Montego");
 document.details.products.options[6]=new Option("Sahara (Jamaica)","Sahara");
 document.details.products.options[7]=new Option("Tuscany/Buckeye","Tuscany/Buckeye");
 document.details.products.options[8]=new Option("Gemini","Gemini");
 document.details.products.options[9]=new Option("Blackbeard","Blackbeard");
 document.details.products.options[10]=new Option("Sparrow","Sparrow");
 document.details.products.options[11]=new Option("Jaguar-Denali","JagDen");
 
 break;
 
 }
 return true;
 }

//TargetDropDownFunction
function targetdropdownlist(listindex)
 {
 
document.details.targets.options.length = 0;
 switch (listindex)
 {

 //Claiborne Printers 
 case "Atlantis" :
 document.details.targets.options[0]=new Option("","");
 document.details.targets.options[1]=new Option("Atlantis1","Atlantis1");
 document.details.targets.options[2]=new Option("Atlantis2","Atlantis2");
 document.details.targets.options[3]=new Option("Atlantis3","Atlantis3");
 document.details.targets.options[4]=new Option("Atlantis4","Atlantis4");
 document.details.targets.options[5]=new Option("Atlantis5","Atlantis5");
 
 break;
 
 case "Cobra" :
 document.details.targets.options[0]=new Option("","");
 document.details.targets.options[1]=new Option("Cobra1","Cobra1");
 document.details.targets.options[2]=new Option("Cobra2","Cobra2");
 document.details.targets.options[3]=new Option("Cobra3","Cobra3");
 document.details.targets.options[4]=new Option("Cobra4","Cobra4");
 document.details.targets.options[5]=new Option("Cobra5","Cobra5");
 
 break;
 
 case "Paris" :
 document.details.targets.options[0]=new Option("","");
 document.details.targets.options[1]=new Option("Paris1","Paris1");
 document.details.targets.options[2]=new Option("Paris2","Paris2");
 document.details.targets.options[3]=new Option("Paris3","Paris3");
 document.details.targets.options[4]=new Option("Paris4","Paris4");
 document.details.targets.options[5]=new Option("Paris5","Paris5");
 
 break;

 case "Palazzo" :
 document.details.targets.options[0]=new Option("","");
 document.details.targets.options[1]=new Option("Palazzo1","Palazzo1");
 document.details.targets.options[2]=new Option("Palazzo2","Palazzo2");
 document.details.targets.options[3]=new Option("Palazzo3","Palazzo3");
 document.details.targets.options[4]=new Option("Palazzo4","Palazzo4");
 document.details.targets.options[5]=new Option("Palazzo5","Palazzo5");
 
 break;

 case "Yankees" :
 document.details.targets.options[0]=new Option("","");
 document.details.targets.options[1]=new Option("Yankees1","Yankees1");
 document.details.targets.options[2]=new Option("Yankees2","Yankees2");
 document.details.targets.options[3]=new Option("Yankees3","Yankees3");
 document.details.targets.options[4]=new Option("Yankees4","Yankees4");
 document.details.targets.options[5]=new Option("Yankees5","Yankees5");
 
 
 break;

 //Homestretch Printers 
 case "Callisto" :
 document.details.targets.options[0]=new Option("","");
 document.details.targets.options[1]=new Option("ppccal","ppccal");

 
 
 break;
 
 case "Camaro" :
 document.details.targets.options[0]=new Option("","");
 document.details.targets.options[1]=new Option("ppccm24","ppccm24");
 document.details.targets.options[2]=new Option("ppccm43","ppccm43");

 
 
 break;
 
 case "Clover" :
 document.details.targets.options[0]=new Option("","");
 document.details.targets.options[1]=new Option("ppccv","ppccv");

 
 
 break;
 
 case "Hickory" :
 document.details.targets.options[0]=new Option("","");
 document.details.targets.options[1]=new Option("ppchk","ppchk");

 
 break;
 
 case "Mirage" :
 document.details.targets.options[0]=new Option("","");
 document.details.targets.options[1]=new Option("ppcmr","ppcmr");

 
 break;
 
 case "NewYork" :
 document.details.targets.options[0]=new Option("","");
 document.details.targets.options[1]=new Option("ppcny","ppcny");

 
 
 break;
 
 case "Topaz" :
 document.details.targets.options[0]=new Option("","");
 document.details.targets.options[1]=new Option("ppctp","ppctp");

 
 
 break;
 
 case "Torquoise" :
 document.details.targets.options[0]=new Option("","");
 document.details.targets.options[1]=new Option("ppctq","ppctq");

 
 
 break;
 
 case "Viking" :
 document.details.targets.options[0]=new Option("","");
 document.details.targets.options[1]=new Option("ppcvk","ppcvk");

 
 
 break;
 
 case "Jib" :
 document.details.targets.options[0]=new Option("","");
 document.details.targets.options[1]=new Option("Jib1","Jib1");
 document.details.targets.options[2]=new Option("Jib2","Jib2");
 document.details.targets.options[3]=new Option("Jib3","Jib3");
 document.details.targets.options[4]=new Option("Jib4","Jib4");
 document.details.targets.options[5]=new Option("Jib5","Jib5");
 
 
 break;
 
 case "Spinnaker" :
 document.details.targets.options[0]=new Option("","");
 document.details.targets.options[1]=new Option("ppcsp","ppcsp");

 break;
 
 case "Bradshaw" :
 document.details.targets.options[0]=new Option("","");
 document.details.targets.options[1]=new Option("armbs","armbs");

 
 
 break;
 
 case "Flamingo" :
 document.details.targets.options[0]=new Option("","");
 document.details.targets.options[1]=new Option("ppcfl","ppcfl");

 
 
 break;
 
 case "JoplinL,M,H" :
 document.details.targets.options[0]=new Option("","");
 document.details.targets.options[1]=new Option("JoplinL,M,H1","JoplinL,M,H1");
 document.details.targets.options[2]=new Option("JoplinL,M,H2","JoplinL,M,H2");
 document.details.targets.options[3]=new Option("JoplinL,M,H3","JoplinL,M,H3");
 document.details.targets.options[4]=new Option("JoplinL,M,H4","JoplinL,M,H4");
 document.details.targets.options[5]=new Option("JoplinL,M,H5","JoplinL,M,H5");
 
 
 break;
 
 case "LongbowH" :
 document.details.targets.options[0]=new Option("","");
 document.details.targets.options[1]=new Option("armlbH","armlbH");

 
 
 break;
 
 case "Manning" :
 document.details.targets.options[0]=new Option("","");
 document.details.targets.options[1]=new Option("ppcmn","ppcmn");
 d
 
 break;
 
 case "Striker" :
 document.details.targets.options[0]=new Option("","");
 document.details.targets.options[1]=new Option("ppcsk","ppcsk");

 
 
 break;
 
 case "Denali" :
 document.details.targets.options[0]=new Option("","");
 document.details.targets.options[1]=new Option("Denali1","Den24gr");
 document.details.targets.options[2]=new Option("Denali2","Dena43rg");
 document.details.targets.options[3]=new Option("Denali3","Denal70gr");
 
 
 
 break;
 
 case "Voyager" :
 document.details.targets.options[0]=new Option("","");
 document.details.targets.options[1]=new Option("voy24gr","voy24gr");
 document.details.targets.options[2]=new Option("voy2Lgr","voy2Lgr");
 document.details.targets.options[3]=new Option("voy43gr","voy43gr");
 
 
 
 break;
 
 case "Pirate" :
 document.details.targets.options[0]=new Option("","");
 document.details.targets.options[1]=new Option("pir24gr","pir24gr");
 document.details.targets.options[2]=new Option("pir2Lgr","pir2Lgr");
 document.details.targets.options[3]=new Option("pir43gr","pir43gr");

 
 break;
 
 case "Thunderball" :
 document.details.targets.options[0]=new Option("","");
 document.details.targets.options[1]=new Option("tbl24gr","tbl24gr");
 
 
 break;
 
 case "Montego" :
 document.details.targets.options[0]=new Option("","");
 document.details.targets.options[1]=new Option("monXXgr","monXXgr");
 
 
 break;
 
 case "Sahara" :
 document.details.targets.options[0]=new Option("","");
 document.details.targets.options[1]=new Option("sahXXgr","sahXXgr");
 
 
 
 break;
 
 case "Tuscany/Buckeye" :
 document.details.targets.options[0]=new Option("","");
 document.details.targets.options[3]=new Option("tusXXgr","tusXXgr");
 
 
 break;
 
 case "Gemini" :
 document.details.targets.options[0]=new Option("","");
 document.details.targets.options[1]=new Option("gem24gr","gem24gr");
 document.details.targets.options[2]=new Option("gem43gr","gem43gr");
 document.details.targets.options[3]=new Option("gem70gr","gem70gr");
 
 
 
 break;
 
 case "Blackbeard" :
 document.details.targets.options[0]=new Option("","");
 document.details.targets.options[1]=new Option("blb70gr","blb70gr");
 
 
 
 break;
 
 case "Sparrow" :
 document.details.targets.options[0]=new Option("","");
 document.details.targets.options[1]=new Option("spw24gr","spw24gr");
 document.details.targets.options[2]=new Option("spw43gr","spw43gr");
 
 
 break;
 
 case "JagDen" :
 document.details.targets.options[0]=new Option("","");
 document.details.targets.options[1]=new Option("den24gr_jr","den24gr_jr");
 document.details.targets.options[2]=new Option("ppcjr_sc_dn","Jppcjr_sc_dn");
 
 
 
 break;
 
 }
 return true;
 }
