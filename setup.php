<?php
require 'keys.php';

function setup($arr){
	$con=mysqli_connect($mysql_server,$mysql_user,$mysql_password,$mysql_db);
	$randWords = array("mitt","that","with","this","from","were","when","each","which","will","about","then","them","number","than","first","been","call","long","part","sound","back","after","thing","just","think","help","much","right","mean","tell","around","farm","three","small","well","must","such","turn","went","read","need","land","different","hand","play","spell","away","animal","house","point","letter","mother","found","study","still","America","high","every","food","between","plant","last","keep","tree","never","start","light","under","story","left","along","might","seem","next","hard","always","often","important","until","children","feet","night","river","carry","stop","without","miss","Indian","girl","mountain","soon","list","song","leave","family","it's","best","better","black","bring","clean","cold","draw","drink","fall","fast","full","funny","giving","green","hold","hurt","jump","pick","pull","round","seven","shall","sing","sleep","thank","upon","wish","band","bank","bell","belt","bend","bent","Bess","blast","bled","blend","blimp","blink","bliss","block","blond","blot","bluff","blunt","brag","brand","brass","brat","bred","brig","brim","brunt","bump","bunt","bust","camp","can't","cast","clad","clam","clamp","clan","clap","clasp","class","cliff","cling","clink","clip","clot","club","clump","clung","crab","craft","cram","cramp","crib","crisp","crop","crust","damp","dent","draft","drag","drank","dress","drift","drill","drip","drop","drug","drum","dump","dust","fact","fell","felt","fill","film","fist","flag","flap","flat","fled","fling","flip","flop","flung","flunk","frank","frill","frisk","frog","frost","gasp","glad","gland","glass","glint","glum","golf","grab","gram","gramp","grand","grant","grasp","grass","grill","grim","grin","grip","grump","grunt","gulp","gust","held","hint","honk","hung","hunt","junk","kept","lamp","lick","lift","limp","lock","luck","lump","Mack","mask","mass","mast","melt","mend","Mick","milk","mill","mint","mist","neck","nest","pant","pass","past","pest","pill","plan","plank","plop","plot","plug","plum","plump","plus","pomp","pond","prank","press","print","prop","punk","raft","rock","romp","Runs","runt","rust","sack","sand","sank","scab","scalp","scan","scat","scram","scrap","script","self","sell","send","sent","sick","skid","skill","skim","skin","skip","skit","skunk","slam","slang","slant","slap","slat","sled","slept","slim","sling","slip","slob","slot","slug","slum","slump","smack","smell","smog","smug","snack","snag","snap","sniff","snip","snub","snug","sock","soft","span","spank","spat","sped","spend","spent","spill","spin","spit","splat","splint","split","spot","spun","spunk","stab","stack","stamp","stand","stem","step","stiff","sting","stink","stomp","strand","strap","strip","struck","strung","stuck","stump","stun","suck","sung","swam","swang","swell","swift","swim","swing","swung","tack","tent","test","till","tilt","tramp","trap","trend","trick","trim","trip","trot","trunk","trust","twang","twig","twin","twist","weld","wind","absent","admit","album","ball","bang","banging","basket","bathtub","bedbug","bench","bill","blank","blasted","blended","blush","bobsled","branch","brush","bunch","camping","catnip","chest","chill","chin","chip","chipmunk","chop","chunk","clock","cloth","contest","crack","crash","crashing","crept","cross","crush","cuff","dash","deck","dentist","dish","disrupt","disrupted","drinking","dusted","expanded","fang","finishing","fish","Fran","fuss","gift","goblin","hall","hang","Hank","himself","hotrod","huff","hunted","index","insisted","insisting","insulted","invent","invented","Jack","jumping","king","kiss","lapdog","lasted","lending","loft","lost","lunch","lung","mall","mascot","math","mess","napkin","pack","path","picnic","pigpen","pinball","pinch","planted","plastic","problem","public","publishing","puff","punishing","rash","rented","rest","rested");
	$i = 0;
	foreach($arr as $a){
		mysqli_query($con,'INSERT INTO Players (unique_id,kills,target,word,alive) VALUES ('.$a.',0,0,'.$randWords[$i].',1)');
		$i++;
	}
}


?>