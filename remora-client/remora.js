
var img = document.createElement("img");
img.setAttribute("src", "/remora/remora.php?current=" + encodeURI(document.location) + "&referrer=" + encodeURI(document.referrer));
img.setAttribute("width", "0");
img.setAttribute("height", "1");
var bodyArr = document.getElementsByTagName("body")
bodyArr[0].appendChild( img );