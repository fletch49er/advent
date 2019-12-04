//function triggered by 'onclick' event
function openWindow(winNum) {
	//set expiry time to midnight
	var midnight = new Date();
	midnight.setHours(23,59,59,0);
	//set path for cookie
	var path = '/examples/advent/';
  //set node to current window
	var node = document.getElementById(winNum);
	node.style.backgroundColor = "#fff"; //white
	node.style.backgroundImage = "url(images/2018/"+winNum+".jpg)";
	node.innerHTML = '<a href="https://www.youtube.com/'+songURL[winNum]+'" target="_blank">'+winNum+'</a>';
  //set open window cookie
  document.cookie = 'windowOpen=yes; expires='+midnight+'; path='+path+'';
	return false;
}

