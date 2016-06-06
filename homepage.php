<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="homepage.css">
<link rel="icon" href="images/favicon.ico">
<title>Hetu</title>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script>
/* function to READ from MySQL $(#chatBoxBottomB).val() */

	function fListClick(elmt)
	{
		var self = $(this);
		var fid = elmt.innerHTML;
		document.getElementById("chatBoxTopT").innerHTML = fid;
	}

	function acceptRequests(elmt)
	{
		var self = $(this);
		var frid = elmt.innerHTML;
		if (confirm('Do you want to add '+ frid + ' as a friend?')) 
		{
    			var un ="<?php echo $_GET['u']; php?>";	
        		var params = {uid: un,fid: frid };
			//document.getElementById("leftHalfI").innerHTML = "";
        		$.ajax({ type: "post", url: "addAsFriend.php", data: params, datatype: "json",
        		success: function(response){    
		
        						},
            		error: function(jqXHR, exception) { errorMySQL(jqXHR, exception); }
        		});
		} else {
		    // Do nothing!
			}
	}

	function pendingRequestsSQL(){
	var un ="<?php echo $_GET['u']; php?>";	
        var params = {uid: un};
	document.getElementById("rightHalfISR").innerHTML = "";
	//document.getElementById("leftHalfI").innerHTML = "";
        $.ajax({ type: "post", url: "pendingRequests.php", data: params, datatype: "json",
             success: function(response){    
		var JsonObject= $.parseJSON(response);   
		             
            for (var i = 0; i < JsonObject.length; i++) 
		{
            		document.getElementById("rightHalfISR").innerHTML += "<div>"+JsonObject[i]+"</div><hr/>";
       		}
        },
            error: function(jqXHR, exception) { errorMySQL(jqXHR, exception); }
        });
    }

	

	/*function pendingRequestsSQL(){
	var un ="<?php echo $_GET['u']; php?>";	
        var params = {uid: un};
	//document.getElementById("leftHalfI").innerHTML = "";
        $.ajax({ type: "post", url: "pendingRequests.php", data: params, datatype: "json",
             success: function(response){    
		var JsonObject= $.parseJSON(response);   
		document.getElementById("rightHalfISR").innerHTML = "";             
            for (var i = 0; i < JsonObject.length; i++) 
		{
            		document.getElementById("rightHalfISR").innerHTML += "<div>"+JsonObject[i]+"</div><hr/>";
       		}
        },
            error: function(jqXHR, exception) { errorMySQL(jqXHR, exception); }
        });
    }*/

	function showNoteSQL(){
	var un ="<?php echo $_GET['u']; php?>";	
        var params = {uid: un};
	//document.getElementById("leftHalfI").innerHTML = "";
        $.ajax({ type: "post", url: "showNote.php", data: params, datatype: "json",
             success: function(response){    
		var JsonObject= $.parseJSON(response);   
		//document.getElementById("rightHalfISR").innerHTML = "";             
            for (var i = 0; i < JsonObject.length; i++) 
		{
            		document.getElementById("rightHalfI").innerHTML += "<div>"+JsonObject[i]+"</div><hr/>";
       		}
        },
            error: function(jqXHR, exception) { errorMySQL(jqXHR, exception); }
        });
    }

	function acceptRequestsSQL(){
	var un ="<?php echo $_GET['u']; php?>";	
        var params = {uid: un};
	//document.getElementById("leftHalfI").innerHTML = "";
	document.getElementById("rightHalfISR1").innerHTML = "";
        $.ajax({ type: "post", url: "acceptRequests.php", data: params, datatype: "json",
             success: function(response){    
		var JsonObject= $.parseJSON(response);   
		             
            for (var i = 0; i < JsonObject.length; i++) 
		{
            		document.getElementById("rightHalfISR1").innerHTML += "<div onclick='acceptRequests(this)'>"+JsonObject[i]+"</div><hr/>";
       		}
        },
            error: function(jqXHR, exception) { errorMySQL(jqXHR, exception); }
        });
    }

	function getFriendListSQL(){
	var un ="<?php echo $_GET['u']; php?>";	
        var params = {uid: un};
	//document.getElementById("leftHalfI").innerHTML = "";
	document.getElementById("leftHalfI").innerHTML = "";      
        $.ajax({ type: "post", url: "friendList.php", data: params, datatype: "json",
             success: function(response){    
		var JsonObject= $.parseJSON(response);  
		        
            for (var i = 0; i < JsonObject.length; i++) 
		{
            		document.getElementById("leftHalfI").innerHTML += "<div class='fList' onclick='fListClick(this)'>"+JsonObject[i]+"</div><hr/>";
       		}
        },
            error: function(jqXHR, exception) { errorMySQL(jqXHR, exception); }
        });
    }
	
    function readMySQL(){
	friendId=$("#chatBoxBottomB").val();
	
        var params = {friendIdPOST: friendId};
        $.ajax({ type: "post", url: "friendSearchResult.php", data: params, datatype: "html",
             success: function(response){                    
            $("#friendSearchBR").val(response); 
            alert(response);
        },
            error: function(jqXHR, exception) { errorMySQL(jqXHR, exception); }
        });
    }

	function sendMessage(){
	friendId=$("#chatBoxTopT").html();
	mesg=$("#friendSearchB").val();
	$("#friendSearchB").val("");
	var un ='<?php echo $_GET['u']; php?>';
        var params = {fid: friendId,uid:un,msg:mesg};
        $.ajax({ type: "post", url: "sendMessage.php", data: params, datatype: "html",
             success: function(response){                   
            
        },
            error: function(jqXHR, exception) { errorMySQL(jqXHR, exception); }
        });
    }	

	function sendMessageSQL(){
	friendId=$("#chatBoxTopT").html();
	var un ='<?php echo $_GET['u']; php?>';
        var params = {fid: friendId,uid:un};
	document.getElementById("chatBoxMiddleM").innerHTML = "";  
        $.ajax({ type: "post", url: "showMessages.php", data: params, datatype: "json",
             success: function(response){                   
            var JsonObject= $.parseJSON(response);  
		            
            for (var i = 0; i < JsonObject.length; i++) 
		{
            		document.getElementById("chatBoxMiddleM").innerHTML += "<div class='fList' onclick='showMessage()'>"+JsonObject[i]+"</div><hr/>";
       		}
        },
            error: function(jqXHR, exception) { errorMySQL(jqXHR, exception); }
        });
    }

	function sendRequestSQL(){
	friendId=$("#chatBoxBottomB").val();
	var un ='<?php echo $_GET['u']; php?>';
        var params = {friendIdPOST: friendId,uid:un};
        $.ajax({ type: "post", url: "sendRequest.php", data: params, datatype: "html",
             success: function(response){                   
            alert(response);
        },
            error: function(jqXHR, exception) { errorMySQL(jqXHR, exception); }
        });
    }
	var myVar1 = setInterval(getFriendListSQL,1000);
	var myVar2 = setInterval(pendingRequestsSQL,1000);
	var myVar3 = setInterval(acceptRequestsSQL,1000);
	var myVar5 = setInterval(showNoteSQL,1000);
	
	var myVar6 = setInterval(sendMessageSQL,1000);

function friendSearchFunc() {
    document.getElementById("friendSearchResult").innerHTML = '<hr/><textarea id="friendSearchBR"></textarea><button id="friendSearchCR" onClick="friendSearchFuncClose()">Close</button><button id="friendSearchSR" onClick="sendRequestSQL()">Send Request</button>';
	readMySQL();
}
function friendSearchFuncClose() {
    document.getElementById("friendSearchResult").innerHTML = '';
}
</script>
</head>
<body>
<div id="upperHalf">
<a href="logon.php"><span id="heading">Hetu: present your opinion</span></a>
<span id="topOptions">
					<span class="divider">|</span><a href="logon.php">   Home   </a><span class="divider">|</span><a href="processLogOut.php">   Log out   </a>
				</span>
<hr/>
</div>
<div id="outer">
	<div id="leftHalf">
		<div id="logonL">Friend List</div>
		<div id="leftHalfI">
		</div>
	</div>
	<div id="rightHalf">
	<div id="rightHalfN">
		<div id="logonR">Notifications</div>
		<div id="rightHalfI">
		
		</div>
	</div>
	<div id="rightHalfSR">
		<div id="logonR">Pending requests</div>
		<div id="rightHalfISR">
		</div>
	</div>
	<div id="rightHalfAR">
		<div id="logonR">Accept requests</div>
		<div id="rightHalfISR1">
		</div>
	</div>
	</div>
	<div id="middle">
		<div id="logonM"><?php echo $_GET['u']; php?></div>
	</div>
	<div id="friendSearch">
		<div id="findFriend">Find Friend</div>
		<textarea id="chatBoxBottomB"></textarea>
		<button id="chatBoxBottomS" onClick="friendSearchFunc()">Search</button>	
		<div id="friendSearchResult"></div>
	</div>
	<div id="chatBoxTop">
	<div id="chatBoxTopT">
		email@email.com
	</div>
		<button id="closeChat">X</button>
	</div>
	<div id="chatBoxMiddle">
		<div id="chatBoxMiddleM">
		</div>		
	</div>
	<div id="chatBoxBottom">
		<textarea id="friendSearchB"></textarea>
		<button id="friendSearchS" onclick="sendMessage()">Send</button>	
	</div>
</div>
</body>
</html>
