Date.prototype.getWeekNumber = function(){
	var d = new Date(+this);
	d.setHours(0,0,0);
	d.setDate(d.getDate()+4-(d.getDay()||7));
	return Math.ceil((((d-new Date(d.getFullYear(),0,1))/8.64e7)+1)/7);
};


var xluerzer_renderer = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer_renderer";
		}

		this.getInstance = function(config) {
			return new xluerzer_renderer_(config);
		
			return instance;
		}
	}
})();

var xluerzer_renderer_ = function(config) {
	this.config = config || {};
};

xluerzer_renderer_.prototype = {


	get_return_value: function(today, dt_start, dt_end) {

		console.log("get return values");

		var timeClass = '';

		if ((today >= dt_start) && (today <= dt_end || dt_end == '0000-00-00 00:00:00'))
		{
			timeClass=' isToday';
			console.info("equal");
		} else if (today < dt_start)
		{
			timeClass=' isFuture';
			console.info("kleiner");
		} else if (today > dt_start)
		{
			timeClass=' isPast';
			console.info("größer");
		}

		switch(''+value)
		{
			case '1': return "<span class='published"+timeClass+"'>published</span>";
			case '2': return "<span class='pending"+timeClass+"'>pending review</span>";
			case '3': return "<span class='draft'"+timeClass+"'>draft</span>";
			default: return "unknown";
		}
	},


	renderer_state_features: function(value,td,r) {

		
		
		switch(''+value)
		{
			case '1':
			td.style = "background-color:#CCFF66;";
			return "published";
			case '2':
			td.style = "background-color:#FFFF66;";
			return "pending review";
			case '3':
			td.style = "background-color:#fa00b6;";
			return "draft";
			default: return "unknown";
		}

		return;
		
		var dt_year = r.data.oetw_year;
		var dt_week = r.data.oetw_week;

		var this_week = new Date().getWeekNumber();
		var this_year = new Date().getFullYear();

		console.info("this week, this year", this_week, this_year);

		var timeClass = '';

		if (this_week == dt_week && this_year == dt_year)
		{
			timeClass =' isToday';
		}
		else if (this_week < dt_week && this_year <= dt_year)
		{
			timeClass =' isFuture';
		}
		else if ((this_week > dt_week && this_year >= dt_year))
		{
			timeClass =' isPast';
		}

		switch(''+value)
		{
			case '1': return "<span class='published"+timeClass+"'>published</span>";
			case '2': return "<span class='pending"+timeClass+"'>pending review</span>";
			case '3': return "<span class='draft'"+timeClass+"'>draft</span>";
			default: return "unknown";
		}
	},
	
	
	renderer_state_students: function(value,td,r) {

		
		
		switch(''+value)
		{
			case 'PUBLISHED':
			td.style = "background-color:#CCFF66;";
			return "published";
			case 'READYFORPUBLISH':
			td.style = "background-color:#FFFF66;";
			return "pending review";
			case 'EDITING':
			td.style = "background-color:#fa00b6;";
			return "EDITING";
			default: return "unknown";
		}

		return;
	},

	renderer_type_magazines: function(value,td,r) {

		switch(''+value)
		{
			case '1'	: return "Luerzers Archive";
			case '2'	: return "Special Packaging Design";
			case '3'	: return "Special Advertising Photography";
			case '4'	: return "Special Design for Music";
			case '5'	: return "Commercial Illustration";
			case '6'	: return "Catalogs and Brochures";
			case '7'	: return "200 Best Ad Photographers";
			case '8'	: return "200 Best Illustrators";
			case '9'	: return "200 Best Packaging Designers";
			case '10'	: return "200 Best Direct Marketing";
			case '11'	: return "200 Best Digital Artist";
			case '12'	: return "Luerzers Archive Film";
			case '13'	: return "Students";
			case '14'	: return "Web";
			case '15'	: return "App";
			default: return "unknown";
		}
	},


	renderer_type_features: function(value,td,r) {

		switch(''+value)
		{
			case '1': return "Audiovisual";
			case '2': return "Campaigns";
			case '3': return "Who\'s Who";
			case '4': return "Digital";
			case '5': return "Editor\'s Blog";
			default: return "unknown";
		}
	},

	renderer_state_online: function(value,td,r) {
		switch(''+value)
		{
			case '1': 
			td.style = "background-color:#CCFF66;";
			return "online";
			default:
			td.style = "background-color:#CCCCCC;color:white;";
			return "offline";
		}
	},
	
	
	renderer_state_active: function(value,td,r) {
		switch(''+value)
		{
			case '1': 
			td.style = "background-color:#CCFF66;";
			return "active";
			default:
			td.style = "background-color:#CCCCCC;color:white;";
			return "inactive";
		}
	},


	renderer_state_online_blog: function(value,td,r) {

		switch(''+value)
		{
			case '0': 
			td.style = "background-color:#CCCCCC;color:white;";
			return "offline";
			case '1': 
			td.style = "background-color:#CCFF66;";
			return "online";
			default: return "unknown";
		}
	},


	renderer_vote: function(value,td,r) {

		switch(''+value)
		{
			case '0': return "Not selected";
			case '2': return "Selected";
		}
	},


	renderer_state_blog: function(value,td,r) {

		var dt_start = Ext.Date.parse(r.data.oebp_date_start, "Y-m-d H:i:s");
		var dt_end = Ext.Date.parse(r.data.oebp_date_end, "Y-m-d H:i:s");

		var today = new Date().setHours(0, 0, 0, 0);
		var timeClass = '';

		if (today >= dt_start && (today <= dt_end || dt_end == '0000-00-00 00:00:00'))
		{
			timeClass=' isToday';
			console.info("equal");
		} else if (today < dt_start)
		{
			timeClass=' isFuture';
			console.info("kleiner");
		} else if (today > dt_start)
		{
			timeClass=' isPast';
			console.info("größer");
		}

		switch(''+value)
		{
			case '1': return "<span class='published"+timeClass+"'>published</span>";
			case '2': return "<span class='pending"+timeClass+"'>pending review</span>";
			case '3': return "<span class='draft'"+timeClass+"'>draft</span>";
			default: return "unknown";
		}
	},

	
	renderer_state_partners: function(value,td,r) {

		var dt_start = Ext.Date.parse(r.data.oep_date_start, "Y-m-d H:i:s");
		var dt_end = Ext.Date.parse(r.data.oep_date_end, "Y-m-d H:i:s");

		var today = new Date().setHours(0, 0, 0, 0);
		var timeClass = '';

		if (today >= dt_start && (today <= dt_end || dt_end == '0000-00-00 00:00:00'))
		{
			timeClass=' isToday';
			console.info("equal");
		} else if (today < dt_start)
		{
			timeClass=' isFuture';
			console.info("kleiner");
		} else if (today > dt_start)
		{
			timeClass=' isPast';
			console.info("größer");
		}

		switch(''+value)
		{
			case '1': return "<span class='published"+timeClass+"'>published</span>";
			case '2': return "<span class='pending"+timeClass+"'>pending review</span>";
			case '3': return "<span class='draft'"+timeClass+"'>draft</span>";
			default: return "<span class='draft'"+timeClass+"'>unknown</span>";
		}
	},


	renderer_state_events: function(value,td,r) {

		
		var dt_start = Ext.Date.parse(r.data.oee_date_from, "Y-m-d");
		var dt_end = Ext.Date.parse(r.data.oee_date_to, "Y-m-d");

		var today = new Date().setHours(0, 0, 0, 0);
		var timeClass = '';

		if (today >= dt_start && (today <= dt_end || dt_end == '0000-00-00 00:00:00'))
		{
			timeClass=' isToday';
			console.info("equal");
		}
		else if (today < dt_start)
		{
			timeClass=' isFuture';
			console.info("kleiner");
		}
		else if (today > dt_end)
		{
			timeClass=' isPast';
			console.info("größer");
		}

		switch(''+value)
		{
			case '1': return "<span class='published"+timeClass+"'>published</span>";
			case '2': return "<span class='pending"+timeClass+"'>pending review</span>";
			case '3': return "<span class='draft'"+timeClass+"'>draft</span>";
			default: return "unknown";
		}
	},


	renderer_state_inspiration: function(value,td,r) {

		var dt_start = Ext.Date.parse(r.data.oei_date_start, "Y-m-d H:i:s");
		var dt_end = Ext.Date.parse(r.data.oei_date_end, "Y-m-d H:i:s");

		var today = new Date().setHours(0, 0, 0, 0);

		// var state = this.get_return_value(today,dt_start,dt_end);

		if ((today >= dt_start && ((today <= dt_end || dt_end == '0000-00-00 00:00:00'))) || (dt_end == '0000-00-00 00:00:00' && dt_start == '0000-00-00 00:00:00'))
		{
			timeClass=' isToday';
			console.info("equal");
		}
		else if (today < dt_start)
		{
			timeClass=' isFuture';
			console.info("kleiner");
		}
		else if (today > dt_start)
		{
			timeClass=' isPast';
			console.info("größer");
		}

		switch(''+value)
		{
			case '1': return "<span class='published"+timeClass+"'>published</span>";
			case '2': return "<span class='pending"+timeClass+"'>pending review</span>";
			case '3': return "<span class='draft'"+timeClass+"'>draft</span>";
			default: return "unknown";
		}
	},






	renderer_state_without_time: function(value,td,r) {

		switch(''+value)
		{
			case '1': return "<span class='published"+timeClass+"'>published</span>";
			case '2': return "<span class='pending"+timeClass+"'>pending review</span>";
			case '3': return "<span class='draft'"+timeClass+"'>draft</span>";
			default: return "unknown";
		}
	},

}