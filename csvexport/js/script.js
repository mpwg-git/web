var backend_request = {

	backendUrl : '',
	ajaxTimeout : 120,

	post : function(cfg) {
		$('#errorMSG').html('');

		var postData = cfg.data || {};

		postData.lang = top.P_LANG;
		postData.p_id = top.P_ID;

		$.ajax({
			type : "POST",
			url : backend_request.backendUrl + '/xsite/call/' + cfg.be_scope + '/' + cfg.be_fn,
			//data: cfg.params || {},
			data : postData,
			timeout : backend_request.ajaxTimeout * 1000,
			error : function(xhr, textStatus, errorThrown) {
				/*
				 var msg = $.parseJSON(xhr.responseText);

				 $('#errorMSG').html(msg.msg);
				 */
				if (!cfg.ecb)
					return false;
				if (!cfg.scope)
					cfg.scope = this;
				cfg.ecb.call(cfg.scope, false, cfg);

			},
			success : function(data, textStatus, jqXHR) {
				//console.info(data, textStatus, jqXHR);
				cfg.cb.call(cfg.scope, true, cfg, data);
			},
			dataType : 'json'
		});
	}
}

var be = {
	
	init : function()
	{
		$(document).on('click', '#userBilder', function(e) {
			e.preventDefault();
			be.getUser();
		});
		
		$(document).on('click', '#roomBilder', function(e) {
			e.preventDefault();
			be.getRooms();
		});
	},
	
	getUser : function()
	{		
		var cfg = {
			be_scope : 'be_mgnt',
			be_fn : 'getUsers',
			data : {},
			scope : this,
			cb : be.getUserCallback
		}

		backend_request.post(cfg);
		
	},
	
	getUserCallback : function(state, cfg, data) {
		$('#results').html(data.html);
	},
	
	getRooms : function()
	{		
		var cfg = {
			be_scope : 'be_mgnt',
			be_fn : 'getRooms',
			data : {},
			scope : this,
			cb : be.getRoomsCallback
		}

		backend_request.post(cfg);
		
	},
	
	getRoomsCallback : function(state, cfg, data) {
		$('#results').html(data.html);
	}
	
}

$(document).ready(function(){
	be.init();
});