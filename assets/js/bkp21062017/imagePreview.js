/**
 * Created by khalidshah on 19-Jun-17.
 */

$.fn.imagePreview = function(opts) {

    if(!opts) {
        alert('options not found.');
        return;
    }
    else if(!opts.tableRowId) {
        alert('tableRowId not found.');
        return;
    }
    else if(!opts.previewImageLimit) { 
        alert('previewImageLimit not found.');
        return; 
    }
    else {
        let count;
        let imageIndex = 0;
        $(this).change(function() {
            count = 0;
            for(var i = 1; i <= this.files.length; i++) {
                count++;
            }
            
            if(opts.previewImageLimit >= (count + getTotalCount())) {
                for(var i = 0; i < this.files.length; i++) {
                    var fReader = new FileReader();
                    fReader.readAsDataURL(this.files[i]);

                    fReader.onloadend = function (e) {
                        var image = $('<img>');
                        image.attr('src', e.target.result);
                        image.attr('index', imageIndex);
                        imageIndex++;
            
                        image.attr('width', '100');
                        var imageTd = $('<td align="center">');
                        imageTd.append(image);
                        $('#'+opts.tableRowId).append(imageTd);    
                    
                    };    
                }    
            }
            
        });

        function getTotalCount() {
            return $('#tr_photos td').length;
        }

    }
};