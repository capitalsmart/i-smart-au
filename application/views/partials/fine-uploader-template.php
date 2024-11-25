<div class="qq-uploader-selector qq-uploader qq-gallery photos" qq-drop-area-text="">
    <div class="progress" id="toalProgress" style="display: none;">
        <div class="progress-bar" role="progressbar" aria-valuenow="0"
                aria-valuemin="0" aria-valuemax="100" style="width:0%">
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
        <span class="qq-upload-drop-area-text-selector"></span>
    </div>
    <div class="imageuploadify ">
        <div class="imageuploadify-images-list text-center">
            <i class="fa fa-cloud-upload"></i>
            <span class="imageuploadify-message">Drag &amp; Drop Your File(s) Here To Upload</span>
            <br/>
            <div class="qq-upload-button-selector">
                    or select file to upload 
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <span class="qq-drop-processing-selector qq-drop-processing">
        <span>Processing dropped files...</span>
        <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
    </span>
    <div class="clearfix"></div>
    <ul class="qq-upload-list-selector qq-upload-list" aria-live="polite" aria-relevant="additions removals">
        <li>
            <div class="qq-progress-bar-container-selector">
                <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                     class="qq-progress-bar-selector qq-progress-bar"></div>
            </div>
            <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
            <img class="qq-thumbnail-selector" qq-max-size="250" qq-server-scale>

            <button type="button"
                    class="btn btn-danger glyphicon glyphicon-remove qq-btn qq-upload-cancel-selector qq-upload-cancel"></button>
            <button type="button" class="qq-btn qq-upload-retry-selector qq-upload-retry">Retry</button>
            <button type="button"
                    class="btn btn-danger glyphicon glyphicon-remove qq-upload-delete-selector qq-upload-delete"></button>
            <span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
        </li>
    </ul>
    
    <dialog class="qq-alert-dialog-selector">
        <div class="qq-dialog-message-selector"></div>
        <div class="qq-dialog-buttons">
            <button type="button" class="qq-cancel-button-selector">Close</button>
        </div>
    </dialog>

    <dialog class="qq-confirm-dialog-selector">
        <div class="qq-dialog-message-selector"></div>
        <div class="qq-dialog-buttons">
            <button type="button" class="qq-cancel-button-selector">No</button>
            <button type="button" class="qq-ok-button-selector">Yes</button>
        </div>
    </dialog>

    <dialog class="qq-prompt-dialog-selector">
        <div class="qq-dialog-message-selector"></div>
        <input type="text">
        <div class="qq-dialog-buttons">
            <button type="button" class="qq-cancel-button-selector">Cancel</button>
            <button type="button" class="qq-ok-button-selector">Ok</button>
        </div>
    </dialog>
</div>