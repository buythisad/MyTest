/*
Copyright (c) 2013 Copyscape / Indigo Stream Technologies (www.copyscape.com)
License: MIT

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/
document.addEventListener('DOMContentLoaded', function(){
var minPub = document.getElementById("minor-publishing-actions");
var newNavPub = document.querySelector(".edit-post-header__settings");

var copyscapeCheck = document.createElement('button');
copyscapeCheck.id = 'copyscape_check';
copyscapeCheck.name = 'save';
copyscapeCheck.innerHTML = 'Copyscape Check';
copyscapeCheck.className = 'preview button';
copyscapeCheck.style.minHeight='33px';
copyscapeCheck.onclick = function() {
	document.getElementById('copyscape_check').innerHTML = '<span style = "color:green"><b>Checking with Copyscape...</b></span>';
	document.getElementById('copyscape_check').style.border = 'none';
	document.getElementById('copyscape_button').click();
};

var copyscapeButton = document.createElement('input');
copyscapeButton.type = 'submit';
copyscapeButton.id = 'copyscape_button';
copyscapeButton.name = 'save';
copyscapeButton.value = 'Copyscape Check';
copyscapeButton.className = 'preview button';
copyscapeButton.style.display = "none";

var copyscapeClear = document.createElement('div');
copyscapeClear.className = 'clear';

var copyscapeDiv = document.createElement('div');
copyscapeDiv.id = 'copyscape-action';

var copyscapeP = document.createElement('p');

appendCopyScapeButton(minPub);
appendCopyScapeButton(newNavPub,true);


if($('.components-button').length) {
    wp.data.subscribe(function () {
        var isSavingPost = wp.data.select('core/editor').isSavingPost();
        var isAutosavingPost = wp.data.select('core/editor').isAutosavingPost();

        if (isSavingPost && !isAutosavingPost && window.publishUpdateButtonClicked) {

            var docContent = getPlainPostContent();
            var updateType = window.publishUpdateButtonClicked;


            window.publishUpdateButtonClicked = false;

            console.log("Going to send request: " + updateType + "; docContent: " + docContent + "; post_id:" + copyscape_info.post_id);

            jQuery.post(copyscape_info.ajax_url + "?action=copyscape_check", {
                "caller_button": updateType,
                "copyscape_post_id": copyscape_info.post_id,
                "post_content": docContent
            }, function (response) {
                console.log(response);

                showCopyscapeNotice(response);

            });
        }
    });

    jQuery('#copyscape_check').click(function() {
        var docContent=  getPlainPostContent();

        jQuery.post(copyscape_info.ajax_url + "?action=copyscape_check", {
            "caller_button": "check",
            "copyscape_post_id":copyscape_info.post_id,
            "post_content":docContent
        }, function (response) {
            showCopyscapeNotice(response);
            document.getElementById('copyscape_check').innerHTML = 'Copyscape Check';

        });
    });
}


        document.addEventListener('click',function(e){
            if(e.target && e.target.classList.contains('editor-post-publish-button')&&!e.target.classList.contains('already-clicked')){

                var copyscapeUpdateType=e.target.innerText.toLowerCase();
                window.publishUpdateButtonClicked=copyscapeUpdateType;

            }
            else if(e.target && e.target.classList.contains('copyscape-revert-button')){
                e.preventDefault();
                copyscapeRevertToDraft();
            }
            else if(e.target && e.target.matches('input[id^=editor-post-private]')){
                if(wp.data.select('core/editor').isCurrentPostPublished())
                    window.publishUpdateButtonClicked='upd-private';
                else
                    window.publishUpdateButtonClicked='pub-private';
            }

        },true);









function appendCopyScapeButton(pubDiv,newWP=false){
	if( pubDiv != null ) {
		if( pubDiv.childNodes.length > 0 )
			copyscapeDiv = pubDiv.insertBefore( copyscapeDiv, pubDiv.childNodes[0] );
		else copyscapeDiv = pubDiv.appendChild( copyscapeDiv );

		if( copyscapeDiv != null ) {
			copyscapeDiv.appendChild(copyscapeButton);
			copyscapeDiv.appendChild(copyscapeCheck);
			if(!newWP) {
                copyscapeDiv.appendChild(copyscapeP);
                copyscapeP.appendChild(copyscapeClear);
            }
		}
	}
}

function showCopyscapeNotice(response){
	if(!response)return;
	response=JSON.parse(response);
    if(response.length==0)
        return;

    ( function( wp ) {
        wp.data.dispatch('core/notices').removeNotice("copyscaperesults");

            wp.data.dispatch('core/notices').createNotice(
            'success', // Can be one of: success, info, warning, error.
            response["message"]+' ',
                {
                    id:"copyscaperesults",
                    isDismissible: true
                }

        );
    } )( window.wp );

    if(response["link_url"]!==undefined){
        var notice = jQuery("div.components-notice__content:contains('Copyscape')");
        jQuery(notice).html(jQuery(notice).html()+'<a class="copyscape-link is-link" href="'+response["link_url"]+'" target="_blank">'+response["link_text"]+'</a>');
    }

    if(response["back_to_drafts"]) {
        var notice = jQuery("div.components-notice__content:contains('Copyscape')");
        jQuery(notice).html(jQuery(notice).html()+'<br/> Your post has been published, but you can move it back to Drafts. <a class="copyscape-revert-button is-link" href="">Move to Drafts</a>');
    }

}

function copyscapeRevertToDraft(){
    wp.data.dispatch('core/editor').editPost({
        status: 'draft'
    });
    wp.data.dispatch('core/editor').savePost();
}

function getPlainPostContent(){
    var docContent=  wp.data.select( "core/editor" ).getEditedPostContent();
    var newNode=document.createElement('span');
    newNode.innerHTML=docContent;
    return newNode.innerText;
}
});

