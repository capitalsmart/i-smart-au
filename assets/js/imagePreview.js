/**
 * Created by khalidshah on 19-Jun-17.
 */

$.fn.imagePreview = function(opts, callback) {

    if (typeof callback == 'function') { // make sure the callback is a function
        callback.call(this); // brings the scope to the callback
    }
    
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
    else if(!opts.draggableArea) { 
        alert('draggableArea not found.');
        return; 
    }
    else {
        let count;
        let imageIndex = 0;
        $(this).change(function() {
            createImagePreviewThumbnail(this.files);
        });
        $(opts.draggableArea).on('dragover', function(event) {
            event.preventDefault();
            event.originalEvent.dataTransfer.dropEffect = 'copy';
        });
        $(opts.draggableArea).on('drop', function(event) {
            this.files = event.originalEvent.dataTransfer.files;
            createImagePreviewThumbnail(this.files);
            callback(this.files);
        });
        function createImagePreviewThumbnail(files) {
            count = 0;
            for(var i = 1; i <= files.length; i++) {
                count++;
            }
            
            if(opts.previewImageLimit >= (count + getTotalCount())) {
                for(var i = 0; i < files.length; i++) {
                    var fReader = new FileReader();
                    fReader.readAsDataURL(files[i]);

                    fReader.onloadend = function (e) {
                        var image = $('<img>');
                        image.attr('src', e.target.result);
                        image.attr('index', imageIndex);
                        image.addClass('img-responsive');
                        imageIndex++;
            
                        image.attr('width', '100');
                        var imageTd = $('<td align="center">');
                        imageTd.append(image);
                        $('#'+opts.tableRowId).append(imageTd);    
                    
                    };    
                }    
            }
        }

        function getTotalCount() {
            return $('#tr_photos td').length;
        }

    }
};