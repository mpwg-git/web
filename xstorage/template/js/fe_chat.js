var fe_chat = (function() {

	return new function() {
		

		this.init = function()
		{
			console.log("chat init");
			
			var me = this;
			
			if (typeof this.checkInterval != "undefined")
			{
				clearInterval(this.checkInterval);
			}
			
			if (typeof this.checkIntervalConversations != "undefined")
			{
				clearInterval(this.checkIntervalConversations);
			}
			
			this.userId = $('.js-chat-data').data("userid");
			this.maxId	= 0;
			
			this.checkForNewMessages();
			this.startIntervallChecking();
			this.startIntervallCheckingConversations();
			
			this.registerListeners();
			
			
		}
		
		this.registerListeners = function()
		{
			
			var me = this;
			
			$('.js-chattext textarea').unbind("keypress");
			$('.js-chattext textarea').keypress(function(e){
		      
				var code = (e.keyCode ? e.keyCode : e.which);
		      
		       	if(code == 13)
		       	{
		       	    return me.submitMessage();
		       	}     
		    });
		    
			
		}
		
		this.submitMessage = function()
		{
			var me 		= this;
			var message = $('.js-chattext textarea').val();
			message		= message.trim();
			
			if (message.trim() == "") {
				return false;
			}

			$.ajax({
				type: 'POST',
				url: '/xsite/call/fe_chat/submitMessage',
				data: {
					userid: me.userId,
					message: message
				},
				success: function(response){
					
					$('.js-chatwindow').append(response.html);
					$('.js-chattext textarea').val("");
					
					if (response.maxid > me.maxId)
					{
						me.maxId = response.maxid;
						
						setTimeout(function(){
							fe_core.chatwindowResize();
							me.scrollToCurrentMessage();	
						}, 200);	
						
						$('.popover-del').popover({
					   		placement: 'top', 
					   		content: '<span class="wirklich">Wirlich<br/><span class="loeschen">löschen?</span></span><div class="button-container"><button class="button btn js-btn-confirm-ja">Ja</button><button class="button btn js-btn-confirm-nein">Nein</button>', 
					   		html: true,
					   		callback: function() {
					   			
					   			var popOver		= this;
					   			var delType  	= this.deltype;
					   			var delId		= this.delid;
					   			
					   			$('.js-btn-confirm-ja').unbind("click");
					   			$('.js-btn-confirm-ja').click(function(){
					   				
					   				console.log("del", delType, delId);
					   				fe_user.delContent(delType, delId);
					   			});
					   			
					   			$('.js-btn-confirm-nein').unbind("click");
					   			$('.js-btn-confirm-nein').click(function(){
					   				
					   				$('.popover-del').popover('hide');
					   			});
					   		}
					   	});
						
					}
					
					
				},
				error: function(response)
				{
					$('.js-chatwindow').append(response.responseJSON.msg.html);
					setTimeout(function(){
						fe_core.chatwindowResize();
						me.scrollToCurrentMessage();	
					}, 200);
				}
			});
			
		}
		
		
		this.scrollToCurrentMessage = function()
		{
			var target 	= $('.js-chatwindow');
			
			if ($(target).length > 0)
			{
				var height = target[0].scrollHeight;
				target.scrollTop(height);
			}
		}
		
		
		this.startIntervallChecking = function()
		{
			var me = this;
			
			this.checkInterval = setInterval(function () {
	            me.checkForNewMessages();
	        },3000);
		}
		
		
		this.startIntervallCheckingConversations = function()
		{
			var me = this;
			
			this.checkIntervalConversations = setInterval(function () {
	            me.checkForNewConversations();
	        },10000);
		}
		
		
		this.checkForNewMessages = function()
		{
			var me = this;
			
			if (me.userId == "" || me.userId == 0){
				return;
			}
			
			$.ajax({
				type: 'POST',
				url: '/xsite/call/fe_chat/checkMessages',
				data: {
					userid: me.userId,
					maxid: me.maxId,
					other_userid: $('.chat:visible').data('userid')
					//maxid: 0,
					//xr_face: fe_core.getCurrentFace()
				},
				success: function(response){
					console.log('new messages, response', response, 'html:', response.html);
					$('.js-chatwindow').append(response.html);
					
					if (response.maxid > me.maxId)
					{
						me.maxId = response.maxid;
						setTimeout(function(){
							fe_core.chatwindowResize();	
							me.scrollToCurrentMessage();
							
							$('.popover-del').popover({
						   		placement: 'bottom', 
						   		content: '<span class="wirklich">Wirlich<br/><span class="loeschen">löschen?</span></span><div class="button-container"><button class="button btn js-btn-confirm-ja">Ja</button><button class="button btn js-btn-confirm-nein">Nein</button>', 
						   		html: true,
						   		callback: function() {
						   			
						   			var popOver		= this;
						   			var delType  	= this.deltype;
						   			var delId		= this.delid;
						   			
						   			$('.js-btn-confirm-ja').unbind("click");
						   			$('.js-btn-confirm-ja').click(function(){
						   				
						   				console.log("del", delType, delId);
						   				fe_user.delContent(delType, delId);
						   			});
						   			
						   			$('.js-btn-confirm-nein').unbind("click");
						   			$('.js-btn-confirm-nein').click(function(){
						   				
						   				$('.popover-del').popover('hide');
						   			});
						   		}
						   	});
							
							
						}, 500);	
						
						
					}
					
					
				},
				failure: function(response)
				{
					
				}
			});
		}
		
		
		this.checkForNewConversations = function()
		{
			var me = this;
			
			$.ajax({
				type: 'POST',
				url: '/xsite/call/fe_chat/checkConversations',
				data: {
					userid: me.userId,
					maxid: me.maxId
				},
				success: function(response){
					
					$('.js-chatcontacts-replace').html(response.html);
					
				},
				
			});
		}
		
		
		
	}	
		
	
})();

$(function(){
	$('.js-chattext button').off('click').on('click', function(){
		fe_chat.submitMessage();
	});
});
