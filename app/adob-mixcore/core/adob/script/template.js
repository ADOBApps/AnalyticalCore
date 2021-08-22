
var core = Object.create(adob);

//core.body.test();
//core.core.test("Prueba");
//core.core.getInstance(window.location);

var _c = core.body.content("content-1", "_i", false);
var _d = document.createElement("h1");
//var _s = core.body.section("content", "_s", true);
$("#tabs_template").tabs(); //jquery

//document.getElementById('tabs_template').prependTo(_d);
core.$("#tabs_template").prependTo(_c); //adob helper function like jquery

core.$("body").append(_d); //for head and body return a corresponding HTMLElement object
/*
* core.$("tagName") //return a HTMLCollection
* Requere define index:
* core.$("tagName")[index];
* e.g. console.log( core.$("script") );
* retun: HTMLCollection { 0: script, 1: script, 2: script, 3: script, 4: script, length: 5 }
*/
core.$("body").append(core.body.row("id_1r" ,false));
core.$("body").append( 
	core.$("<div>", 
		{
			"id": "testdiv"
		}
	) 
);
core.$("head").append( 
	core.$("<meta>", 
		{
			"name": "author"
		}
	) 
);
core.$("body").append( 
	core.$("<base>", 
		{
			"href": "www.google.com.co",
			"target": "_self"
		}
	) 
);
core.$("head").append( 
	core.$("<script>", 
		{
			"src": "./script/adob.js",
		}
	) 
);