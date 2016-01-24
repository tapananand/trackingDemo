var body = document.body;
var iframe = document.createElement("iframe");
iframe.setAttribute("height", "100px");
iframe.setAttribute("width", "100px");
iframe.style.border = "0px";
iframe.setAttribute("src", "http://localhost:81/webtracking/dummy.php");
body.appendChild(iframe);