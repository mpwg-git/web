
 
$(document).ready(function()
{
	
 var dkrm = new Darkroom('#target', {
      // Size options
      minWidth: 100,
      minHeight: 100,
      maxWidth: 500,
      maxHeight: 500,

      plugins: {
        //save: false,
        crop: {
          //minHeight: 50,
          //minWidth: 50,
          //ratio: 1
        }
      },
      init: function() {
        var cropPlugin = this.getPlugin('crop');
        cropPlugin.selectZone(170, 25, 300, 300);
        //cropPlugin.requireFocus();
      },
      
      save: {
	      callback: function() {
	          this.darkroom.selfDestroy(); // Cleanup
	          var newImage = dkrm.canvas.toDataURL();
	          fileStorageLocation = newImage;
	      }
	  }
	  
    });

});