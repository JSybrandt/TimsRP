function addRequest(){
	var g = 'asdf';
	var u = 'stuartsoft';
	var stuff = {gameid: g, userid: u};
	$.ajax(stuff);
	return true;
}