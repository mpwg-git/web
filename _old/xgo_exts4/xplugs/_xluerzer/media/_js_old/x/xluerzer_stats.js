var xluerzer_stats = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer_stats";
		}

		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xluerzer_stats_(config);
			}
			return instance;
		}
	}
})();

var xluerzer_stats_ = function(config) {
	this.config = config || {};
};

xluerzer_stats_.prototype = {
	
	

	getMenuStats: function() {

		var menuItems =  [

			{
				text:'Video Encoder',
				disabled: true,
				idx: -1
			},
			
			{
				text:'Uploads S3',
				disabled: true,
				idx: -1
			},
			
			{
				text:'Magazine',
				idx: -1,
				menu: [
					{
						text:'Storage',
						disabled: true,
						idx: -1
					},
					{
						text:'HighRes',
						disabled: true,
						idx: -1
					},
				]
				
			},
			
			{
				text:'Live Syncer',
				disabled: true,
				idx: -1
			},
			
			{
				text:'S3 Stats',
				disabled: true,
				idx: -1
			},
			
			{
				text:'Ranking Exclusion',
				disabled: true,
			}

		];

		return menuItems;
	},

	
	showVideoEncoder: function() {
	
		var gui = create.widget({
			xtype: 'panel',
			html: 'Video encoder stats'
		});
		this.showContent(gui);
	},
	
	showUploads: function() {
	
		var gui = create.widget({
			xtype: 'panel',
			html: 'S3 Uploads stats'
		});
		this.showContent(gui);
	},
	
	showMagazineStorage: function() {
	
		var gui = create.widget({
			xtype: 'panel',
			html: 'Magazine storage stats'
		});
		this.showContent(gui);
	},
	
	showMagazineHiRes: function() {
	
		var gui = create.widget({
			xtype: 'panel',
			html: 'Magazine HiRes stats'
		});
		this.showContent(gui);
	},
	
	showLiveSyncer: function() {
	
		var gui = create.widget({
			xtype: 'panel',
			html: 'Live Syncer stats'
		});
		this.showContent(gui);
	},
	
	showRankingExclusion: function() {
	
		var gui = create.widget({
			xtype: 'panel',
			html: 'Overview of contacts excluded from ranking'
		});
		this.showContent(gui);
	}
}