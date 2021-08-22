//<></>
/********************************************************
**********************How use****************************
*             var core = Object.create(adob);           *
*              core.body.test();                        *
*               core.core.test("Prueba");               *
*         core.$("tabs_template").prependTo(_c);        *
*       core.$("body").append(core.$("<tag>",{}));      *
********************************************************/

/*
HTMLElement = typeof(HTMLElement) != 'undefined' ? HTMLElement : Element;

HTMLElement.prototype.prepend = function(element) {
    if (this.firstChild) {
        return this.insertBefore(element, this.firstChild);
    } else {
        return this.appendChild(element);
    }
};

//Use as
document.getElementById('container').prepend(document.getElementById('block'));
// or
var element = document.getElementById('anotherElement');
document.body.prepend(div);

*/

var adob = {
	instance: "",
	HTMLElement : typeof(HTMLElement) != 'undefined' ? HTMLElement : Element,
		/*
		*Condition ? val1 : val2
		* IF (true) {operator = val1}
		* ELSE {operator = val2}
		* var status = (age >= 18) ? 'adult' : 'minor';
		* IF (true) {status = 'adult'}
		* ELSE {status = 'minor'}
		*/
	$: function(_element, _obj) {
		/*
		* ADOB helper like $ = Jquery
		* _obj must be a JSON Object
		*/
		if (_element.startsWith("#")) {
			if ( document.getElementById(_element.slice(1)) != "undefined" ) {
				return document.getElementById(_element.slice(1));
			} else{
				console.log("undefined element type");
				return "undefined";
			}
		} else if (_element.startsWith(".")) {
			if ( document.getElementsByClassName(_element.slice(1)) != "undefined" ) {
				return document.getElementsByClassName(_element.slice(1));
			} else{
				console.log("undefined element type");
				return "undefined";
			}
		} else if ( ( _element.startsWith("<") ) && ( _element.endsWith(">") ) ) {
			try{
				if ( document.createElement(_element.slice(1, -1)) != "undefined" ){
					console.log("HTMLElement was created");
					_MyElement = document.createElement( _element.slice(1, -1) );
					if ( (typeof(_obj) == "object") ) {
						//Get object elements and def _MyElement properties
						if ( _element.slice(1, -1) == "link" ) {
							_MyElement.href = _obj.href;
							_MyElement.rel = _obj.rel;
						} else if ( _element.slice(1, -1) == "meta" ) {
							_charset = _obj.charset != 'undefined' &&  null ? _obj.charset : "UTF-8";
							_MyElement.name = _obj.name;
							_MyElement.setAttribute("charset", _charset );
						} else if ( _element.slice(1, -1) == "script" ) {
							_MyElement.src = _obj.src;
							_MyElement.type = "text/javascript";
						} else if ( _element.slice(1, -1) == "title" ) {
							_MyElement.setAttribute("text", _obj.text);
						} else {
							_MyElement.id = _obj.id;
							_MyElement.className = _obj.class;
						}
						return _MyElement;
					} else {
						return  _MyElement;
					}
				} else {
					console.log("Cannot be create this HTMLElement");
					return "undefined";
				}
			} catch(MyError){
				console.error(MyError);
			}
		} else if( document.getElementsByTagName(_element) != "undefined" ) {
			if ( ( _element === "body" ) || ( _element === "head" ) ) {
				//In theory a document must contain one body and one head
				return document.getElementsByTagName(_element)[0];
				//return a HTMLElement object
			} else {
				return document.getElementsByTagName(_element);
				/*
				* return a HTMLCollection
				* adob.$("tagName") //return an array
				* Requere define index:
				* adob.$("tagName")[index];
				* e.g. console.log( adob.$("script") );
				* retun: HTMLCollection { 0: script, 1: script, 2: script, 3: script, 4: script, length: 5 }
				*/
			}
		} else {
			console.log("undefined element type");
			return "undefined";
		}
	},
	prependTo: HTMLElement.prototype.prependTo = function(_element1) {
		if (this.firstChild) {
			return this.insertBefore(_element1, this.firstChild);
		} else {
			return this.appendChild(_element1);
		}
	}
	/*//Use as
			document.getElementById('container').prependTo(document.getElementById('block'));
		// or
			var element = document.getElementById('anotherElement');
			document.body.prependTo(div);
		//or
			abob.$("container").prependTo
	*/
};

adob.body = {
	mycore: Object.create(adob),
	main: function (_boo){
		let _prop = this.mycore.$("<main>");
		let _body = this.mycore.$("body");
		_body.appendChild(_prop);
		if (_boo) {
			//document.getElementsByTagName("body")[0].append(_section);
			_body.append(_prop);
		}
		return _prop;
	},

	section: function (_class, _id, _boo){
		let _body = this.mycore.$("body");
		let _section = this.mycore.$("<section>", 
			{
				"id": _id,
				"class": _class
			}
		);
		if (_boo) {
			//document.getElementsByTagName("body")[0].append(_section);
			_body.append(_section);
		}
		return _section;
	},

	content: function (_class, _id, _boo){
		let _body = this.mycore.$("body");
		let _prop = this.mycore.$("<div>", 
			{
				"id": _id,
				"class": "content " + _class + ""
			}
		);
		if (_boo) {
			//document.getElementsByTagName("body")[0].append(_prop);
			_body.append(_prop);
		}
		return _prop;
	},

	row: function (_id, _boo){
		let _body = this.mycore.$("body");
		let _prop = this.mycore.$("<div>", 
			{
				"id": _id,
				"class": "row"
			}
		);
		if (_boo) {
			//document.getElementsByTagName("body")[0].append(_prop);
			_body.append(_prop);
		}
		return _prop;
	},

	container: function (_id, _boo){
		let _body = this.mycore.$("body");
		let _prop = this.mycore.$("<div>", 
			{
				"id": _id,
				"class": "container"
			}
		);
		if (_boo) {
			//document.getElementsByTagName("body")[0].append(_prop);
			_body.append(_prop);
		}
		return _prop;
	},
	test: function(){
		alert("test");
	}
};

adob.core = {
	mycore: Object.create(adob),
	style: function (_type){
		/******Bootstrap/jquery-ui******/
		
		if (_type == "bootstrap") {
			this.getResponseJSON("../data/modules.json", function(p_ajax){
				let data = JSON.parse(p_ajax.responseText);
				for (var i = 0; i <= data.bootstrap.style.length - 1; i++) {
					if ( (data.bootstrap.style[i].search(".css") != -1) ) {
						//var _css1 = document.createElement("link");
						var _css1 = this.mycore.$("<link>", 
							{
								"rel": "stylesheet",
								"href": data.bootstrap.style[i]
							}
						);
						//_css1.rel = "stylesheet";
						//_css1.href = data.bootstrap.style[i];
						this.mycore.$("head").appendChild(_css1);
						console.log("CSS added " + data.bootstrap.style[i]);
					} else {
						console.log("Unsoported file");
					}
				}
			});
		} else if (_type == "jquery_ui") {
			this.getResponseJSON("../data/modules.json", function(p_ajax){
				let data = JSON.parse(p_ajax.responseText);
				for (var i = 0; i <= data.jquery_ui.style.length - 1; i++) {
					if ( (data.jquery_ui.style[i].search(".css") != -1) ) {
						/*var _css2 = document.createElement("link");
						_css2.rel = "stylesheet";
						_css2.href = data.jquery_ui.style[i];
						document.getElementsByTagName("head")[0].appendChild(_css2);*/
						var _css2 = this.mycore.$("<link>", 
							{
								"rel": "stylesheet",
								"href": data.jquery_ui.style[i]
							}
						);
						this.mycore.$("head").appendChild(_css2);
						console.log("CSS added " + data.jquery_ui.style[i]);
					} else {
						console.log("Unsoported file");
					}
				}
			});
		} else if (_type == null) {
			this.getResponseJSON("../data/modules.json", function(p_ajax){
				let data = JSON.parse(p_ajax.responseText);
				for (var i = 0; i <= data.ui.style.length - 1; i++) {
					if ( (data.ui.style[i].search(".css") != -1) ) {
						/*var _css3 = document.createElement("link");
						_css3.rel = "stylesheet";
						_css3.href = data.ui.style[i];
						document.getElementsByTagName("head")[0].appendChild(_css3);*/
						var _css3 = this.mycore.$("<link>", 
							{
								"rel": "stylesheet",
								"href": data.ui.style[i]
							}
						);
						this.mycore.$("head").appendChild(_css3);
						
						console.log("CSS added " + data.ui.style[i]);
					} else {
						console.log("Unsoported file");
					}
				}
			});
		}
	},
	createxmlhr: function (){
		var xmlhttp=null;
		if (window.ActiveXObject){
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} else if (window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		}
		return xmlhttp;
	},
	getResponseTextJSON: function (_file, _callback){
		_ajax = this.createxmlhr();
		_ajax.overrideMimeType("application/json");
		_ajax.open("GET", _file, true);
		_ajax.send(null);
		_ajax.onreadystatechange = function(){
			if ( (_ajax.readyState == 4) && (_ajax.status == 200) ) {
				_callback(_ajax.responseText);
			}
		}
	},
	getResponseJSON: function (_file, _callback){
		_ajax = this.createxmlhr();
		_ajax.overrideMimeType("application/json");
		_ajax.open("GET", _file, true);
		_ajax.send(null);
		_ajax.onreadystatechange = function(){
			if ( (_ajax.readyState == 4) && (_ajax.status == 200) ) {
				_callback(_ajax);
			}
		}
	},
	getResponse: function (_file, _callback){
		_ajax = this.createxmlhr();
		//_ajax.overrideMimeType("application/json");
		_ajax.open("GET", _file, true);
		_ajax.send(null);
		_ajax.onreadystatechange = function(){
			if ( (_ajax.readyState == 4) && (_ajax.status == 200) ) {
				_callback(_ajax);
			}
		}
	},
	getInstance: function (_loc) {
		//let _instance = _loc.href;
		this.instance = _loc.href;
		alert(this.instance)
	},
	test: function (_text) {
		alert(_text);
	}
};








